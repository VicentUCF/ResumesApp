<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResume;
use App\Models\Publication;
use App\Models\Resume;
use Illuminate\Database\QueryException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $resumes = auth()->user()->resumes;
        return view('resumes.index',compact('resumes'));
    }

    public function create()
    {
        $resume = json_encode(Resume::factory()->make());
        return view('resumes.create', compact('resume'));
        //return view('resumes.create');
    }

    private function savePicture(string $blob): string
    {
        $img = Image::make($blob);
        $fileName = Str::uuid() . '.' . array_slice(explode('/', $img->mime()), -1)[0];
        $filePath = "/storage/pictures/{$fileName}";
        $img->save(public_path($filePath));

        return $filePath;
    }

    public function store(StoreResume $request)
    {
        $data = $request->validated();
        $picture = $data['content']['basics']['picture'];
        if ($picture !== '/storage/pictures/default.png') {
            $data['content']['basics']['picture'] = $this->savePicture($picture);
        }
        $resume = auth()->user()->resumes()->create($data);

        Session::flash('alert', [
            'type' => 'info',
            'messages' => ["Resume $resume->title created succesfully"],
        ]);
        
        return response($resume, Response::HTTP_CREATED);
    }

    public function edit(Resume $resume)
    {   
        $this->authorize('update', $resume);
        return view("resumes/edit", ['resume' => json_encode($resume)]);
    }

    public function update(StoreResume $request, Resume $resume){
        $this->authorize('update', $resume);

        $data = $request->validated();
        $picture = $data['content']['basics']['picture'];
        if ($picture !== $resume->content['basics']['picture']) {
            $uri = $this->savePicture($picture);
            $data['content']['basics']['picture'] = $uri;
        }
        $resume->update($data);

        Session::flash('alert', [
            'type' => 'info',
            'messages' => ["Resume $resume->title updated succesfully"],
        ]);

        return response(status: Response::HTTP_OK);
    }

    public function destroy(Resume $resume){
        $this->authorize('delete',$resume);

        try{
            $resume->delete();
        }catch(QueryException $e){
            $publication = Publication::where('resume_id', $resume->id)->first();

            return redirect()->route('resumes.index')->with('alert', [
                'type' => 'danger',
                'messages' => ["
                    Resume $resume->title cannot be deleted because publication <a href='$publication->url'>$publication->url</a>
                    is using it! Delete the publication first!
                
                "],
            ]);
        }

        return redirect()->route('resumes.index')->with('alert', [
            'type' => 'danger',
            'messages' => ["Resume $resume->title deleted succesfully"],
        ]);

    }
}
