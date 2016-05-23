@extends('layouts.default')

@section('content')
    <div class="container marketing">
        <div class="row">

            @include('layouts.partials.errors')
            @include('layouts.partials.success')
            @include('home._album_view')

        </div>
        <div class="text-center">
            {!! $albums->links() !!}
        </div>
    </div>
@endsection