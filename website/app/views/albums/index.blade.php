@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::check())
                @if(Auth::user()->isWebsiteAdmin())
                    <h3>
                        <a href="/albums/create/"><span class="glyphicon glyphicon-pencil"></span> Neues Fotoalbum hinzuf&uuml;gen</a>
                    </h3>
                @endif
            @endif
        </div>
        @foreach($albums as $album)
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <a href="#">
                        @if($album->titlePhoto != null)
                        <img class="img-responsive" src="{{ $album->titlePhoto->getPath() }}" alt="titlePhoto">
                        @else
                        <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                        @endif
                    </a>
                </div>
                <div class="col-lg-5 col-md-5">
                    <h3>
                        {{ $album->name }}
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                | <a href="/albums/{{ $album->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </h3>
                    <h4>Fotos und Videos</h4>
                    <p>{{ $album->description }}</p>
                    <div class="btn-opel-hover">
                        <a class="btn btn-opel" href="/albums/{{ $album->id }}/photos/">
                            Fotos ansehen <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        {{ $albums->links() }}
        {{--
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thumbnail Gallery</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300">
                </a>
            </div>
            <div class="pager">
                <a class="btn btn-opel" href="#"><span class="glyphicon glyphicon-chevron-left"> Previous</span></a>
                <a class="btn btn-opel" href="#">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div><!-- /.row --> --}}
    </div><!-- /.container -->
@stop