@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-inline-flex">
        <div>
            <img style="width: 120px;" src="{{ $resume->picture }}"></img>
        </div>
   

        <div class="ml-4">
            <div>
                <h1>{{ $resume->title }}</h1>
            </div>

            <div>
                <h1>{{ $resume->name }}</h1>
            </div>

            <div class="d-inline-flex">
                <div class="font-weith-bold">
                    <a href="mailto:{{ $resume->email }}">{{ $resume->email }}</a>
                </div>
                <div class="font-weith-bold ml-3">
                    <a href="{{ $resume->website }}">{{ $resume->website }}</a>
                </div>
            </div>
        </div>
    </div>

    @if (isset($resume->about))
        <div class="mt-3">
            <p class="font-weight-bold">{{ $resume->about }}</p>
        </div>
    @endif
</div>
@endsection
