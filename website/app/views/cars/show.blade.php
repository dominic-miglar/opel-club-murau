@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <a href="/cars/{{ $car->id }}/">
                            @if($car->album->titlePhoto != null)
                                <img class="img-responsive" src="{{ $car->album->titlePhoto->getPath() }}" alt="titlePhoto">
                            @else
                                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h3>
                            {{ $car->manufacturer }} {{ $car->model }}
                        </h3>
                        <h4>
                            @if(Auth::check())
                                @if(Auth::user()->isWebsiteAdmin())
                                    <a href="/cars/{{ $car->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                                @endif
                            @endif
                        </h4>
                        {{-- <h4>Alltagsbiatch</h4> --}}
                        <ol class="list-unstyled">
                            @if($car->yearBuilt != null)
                            <li><strong>Baujahr: </strong>{{ $car->yearBuilt }}</li>
                            @endif
                            @if($car->horsepower != null)
                            <li><strong>Leistung: </strong>{{ $car->horsepower }}</li>
                            @endif
                        </ol>
                        {{--
                        <a class="btn btn-opel" href="#">
                            Projekt ansehen <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        --}}
                    </div>
                </div> <!-- /.row -->
                <div class="row">
                    <br />
                    {{ $car->description }}
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">{{ $car->manufacturer }} {{ $car->model }}</h3>
                        <span class="glyphicon glyphicon-plus-sign"></span><a href="/albums/{{ $car->album->id }}/photos/create/"> Neue Fotos hinzuf&uuml;gen</a>
                    </div>
                    <br />
                    @foreach($photos as $photo)
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="/albums/{{ $car->album->id }}/photos/{{ $photo->id }}/">
                                <img class="img-responsive" src="{{ $photo->getThumbPath() }}">
                            </a>
                        </div>
                    @endforeach
                </div>
                {{--
                <div class="row">
                    <div class="pager">
                        <a class="btn btn-opel" href="#"><span class="glyphicon glyphicon-chevron-left"> Previous</span></a>
                        <a class="btn btn-opel" href="#">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                --}}
            </div><!-- /.blog-main -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>Willkommen</h4>
                    <p>
                        auf der Webseite des Opel-Club-Murau!
                    </p>
                    <p>
                    <p>
                        Auf dieser Seite findet ihr alle aktuellen Informationen bezüglich des Clubs und unseren Events.
                    </p>
                </div>
                <div class="sidebar-module">
                    <h4>Archive</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">April 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Wir sind auch auf..</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop