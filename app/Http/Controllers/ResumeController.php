<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = auth()->user()->resumes;
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = 'test';
        return view('resumes.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
    
        $resume = $user->resumes()->create([
            'title' => $request['title'],
            'name' => $user->name,
            'email' => $user->email,
        ]);

        return redirect()->route('resumes.index')->with('alert', [
            'type' => 'success',
            'messeage' => "resume $resume->title created succesfully"
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        $this->authorize('view', $resume);
        return view('resumes.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        $this->authorize('update', $resume);
        return view('resumes.edit',compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
      
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'picture' => 'nullable|image',
            'about' => 'nullable|string',
            'skills' => 'nullable|array',
            'title' => Rule::unique('resumes')
                ->where(fn($query) => $query->where('user_id', $resume->user->id))
                ->ignore($resume->id)
        ]);

        if(array_key_exists('picture', $data)){
            $picture = $data['picture']->store('pictures', 'public');
            //Image::make(public_path("storage/$picture"))->fit(800, 800)->save();
            $data['picture'] = "/storage/$picture";

        }

        $resume->update($data);

        return redirect()->route('resumes.index')->with('alert', [
            'type' => 'success',
            'messeage' => "resume $resume->title updated succesfully"
        ]);

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        $this->authorize('delete', $resume);
        $resume->delete();
        return redirect()->route('resumes.index')->with('alert', [
            'type' => 'danger',
            'messeage' => "resume $resume->title updated succesfully"
        ]);
    }
}
