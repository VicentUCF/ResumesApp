@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class="text-light">
            <div class="cotainer my-3">
                @if(isset($publication))
                    <form method="POST" action="{{ route('publications.update', $publication->id ) }}">
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('publications.store') }}">
                @endif
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Resume</label>
                            <select id="resume" name="resume_id" class="form-control bg-dark text-light">
                               @foreach ($resumes as $resume)
                                   @if (isset($publication) && $publication->resume->id === $resume->id)
                                     <option selected value="{{ $resume->id }}">{{ $resume->title }}</option>
                                   @else
                                    <option value="{{ $resume->id }}">{{ $resume->title }}</option>
                                   @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Theme</label>
                             <select id="theme" name="theme_id" class="form-control bg-dark text-light">
                                @foreach ($themes as $theme)
                                   @if (isset($publication) && $publication->theme->id === $theme->id)
                                     <option selected value="{{ $theme->id }}">{{ $theme->theme }}</option>
                                   @else
                                    <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                                   @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Visibility</label>
                            <select name="visibility" class="form-control bg-dark text-light">
                                 @foreach (['public', 'private', 'hide'] as $visibility )
                                   @if (isset($publication) && $publication->visibility === $visibility)
                                    <option selected value="{{ $visibility }}">{{ $visibility }}</option>
                                   @else
                                    <option value="{{ $visibility }}">{{ $visibility }}</option>
                                   @endif
                                @endforeach
                            </select>


                        </div>
                        <div class="col-md-3 mt-3">
                            <button class="mt-3 btn btn-primary w-100" type="submit">
                                Save
                            </button>
                        </div>

                    </div>



                </form>
            </div>
        </div>

        <div class="mt-2 bg-light rounded">
            <iframe id="iframe" class="border rounded w-100" style="height: 640px;"></iframe>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', async () =>{
        const iframe = document.getElementById('iframe');

        async function loadPreview(resume,theme){
            iframe.srcdoc = '<h1>Loading Preview...</h1>'
            console.log(resume, theme);
            try {
                const res = await axios.post(route('publications.preview'),{

                    resume_id: resume,
                    theme_id: theme,
                });

                iframe.srcdoc = res.data;

            } catch (e) {
                console.log(e);
            }
        }

        const resume = document.getElementById('resume');
        const theme = document.getElementById('theme');

        await loadPreview(resume.value, theme.value);

        resume.onchange = async (e) => await loadPreview(e.target.value, theme.value);
        theme.onchange = async (e) => await loadPreview(resume.value, e.target.value);

    });
</script>
