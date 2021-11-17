<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Resume;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class PublicationController extends Controller
{

    private $rules = [
        'resume_id' => 'required|numeric',
        'theme_id' => 'required|numeric',
        'visibility' => 'nullable|string',
    ];

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        $this->jsonResumeAPi = config('services.jsonresume.api');
    }

    public function show(Publication $publication)
    {
        if ($publication->visibility === 'private') {
            if (!auth()->check()) {
                return redirect(route('login'));
            }
            if (auth()->user()->id !== $publication->user_id) {
                abort(Response::HTTP_FORBIDDEN);
            }
        }

        return $this->render($publication->resume, $publication->theme);
    }

    public function index()
    {
        $publications = auth()->user()->publications;

        return view('publications.index', compact('publications'));
    }

    public function preview(Request $request)
    {
        $data = $request->validate($this->rules);
        $theme = Theme::findOrFail($data['theme_id']);
        $resume = Resume::findOrFail($data['resume_id']);

        if (auth()->user()->id !== $resume->user_id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $this->render($resume, $theme);
    }

    private function render(Resume $resume, Theme $theme)
    {
        $response = Http::post("{$this->jsonResumeAPi}/theme/{$theme->theme}", [
            'resume' => $resume->content,
        ]);

        return response($response, $response->status());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resumes = auth()->user()->resumes;
        if (count($resumes)<1){
            return redirect()->route('resumes.create');
        }
        $themes = Theme::all();
        return view('publications.edit', compact('resumes','themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        $publication = Auth()->user()->publications()->create(array_merge(
            $data,
            ['url' => 'tmp'],
        ));
        
        $url = route('publications.show', $publication->id);
        $publication->update(compact('url'));

        $resume = Resume::where('id', $data['resume_id'])->first();
        $theme = $publication->theme()->get()->first();

        return redirect()->route('publications.index')->with('alert', [
            'type' => 'success',
            'messages' => ["Resume $resume->title published with theme $theme->theme at <a href='$url'>$url</a>"],
        ]);
        
        //"Resume $resume->title published with theme $theme->theme at <a href='$url'>$url</a>
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $this->authorize('update',  $publication);
        $resumes = auth()->user()->resumes;
        $themes = Theme::all();
   

        return view('publications.edit',compact(
            'publication',
            'resumes',
            'themes',
 
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $this->authorize('update',$publication);
        $data = $request->validate($this->rules);

        $publication->update($data);

        return redirect()->route('publications.index')->with('alert', [
            'type' => 'info',
            'messages' => ["Publication $publication->url updated"],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $this->authorize('delete', $publication);
        $publication->delete();

        return redirect()->route('publications.index')->with('alert', [
            'type' => 'danger',
            'messages' => ["Publication $publication->url deleted"],
        ]);
    }
}
