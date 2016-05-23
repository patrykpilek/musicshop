@foreach ($albums as $album)
    <div class="col-lg-4">

        @if(Storage::disk('album')->has($album->id .'-album-image.jpg'))
            <img class="img-thumbnail" src="{{ url('/home/albumImage/'. $album->id .'-album-image.jpg') }}" alt="{{ $album->album_name }}" width="250" height="250">
        @else
            <img class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" width="250" height="250">
        @endif


        <h2>{{ $album->album_name }}<p><small>{{ $album->artist_name }}</small></p></h2>
        <h5>{{ $album->format }}</h5>
        <p>
        <form class="form-inline">
            <a class="btn btn-primary" href="{{ url('/home/show/'. $album->id ) }}" role="button">
                <i class="fa fa-eye" aria-hidden="true"></i> View details
            </a>
            <form method="post" role="form" action="{{ url('/basket') }}">
                <input type="hidden" name="album_id" value="{{$album->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <button type="submit" class="btn btn-danger">
                    <span class="fa fa-shopping-cart"></span> Add to Basket
                </button>
            </form>
        </form>
        </p>
    </div>
@endforeach