@extends('layouts.app')

@section('content')
<div class='container'>
        <button class="btn btn-success mt-3 w-100">Download</button>
        <div class="mt-2 bg-light rounded">
            <iframe srcdoc="{{ $resume }}"id="iframe" class="border rounded w-100" style="height: 750px;">{!! $resume !!}</iframe>
        </div>
        <div class="d-flex justify-content-end">
        </div>
    </div>
@endsection
