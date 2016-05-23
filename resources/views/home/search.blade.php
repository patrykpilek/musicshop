@extends('layouts.default')

@section('content')
    <div class="container marketing">
        <div class="row">
            @if (!$albums)
                <p>No results found, Sorry.</p>
            @else
                @include('home._album_view')
            @endif
        </div>
    </div>
@endsection