@extends('layouts.app')
@section('content')
    <div class='container'>
       <div class="row">
        @foreach ($resumes as $resume)
            <div class='col-md-4 mb-3'>
                <div class='card bg-secondary border-white p-3 text-center'>
                    <div class='card-body'>
                        <h3 class="card-title text-light text-capitalize" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                            {{ $resume->title }}
                        </h3>
                        <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                            {{ $resume->content['basics']['summary'] ?? 'No sumary' }}
                        </p>
                        <p class="text-light"> {{ $resume->created_at }}</p>

                        <div class="d-lg-inline-flex">
                            <div>
                                <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-primary mb-2">
                                <i class="fas fa-pencil-alt"></i>
                                Edit Resume
                                </a>
                            </div>

                            <div class="ml-lg-1">
                                <form method="POST" action="{{ route('resumes.destroy', $resume->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Delete Resume
                                    </button>
                                </form>
                             </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
       </div>
    </div>
@endsection
