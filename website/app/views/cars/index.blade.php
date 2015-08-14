@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::check())
                @if(Auth::user()->isWebsiteAdmin())
                    <h3>
                        <a href="/cars/create/"><span class="glyphicon glyphicon-pencil"></span> Neues Auto hinzuf&uuml;gen</a>
                    </h3>
                @endif
            @endif
            @foreach($cars as $car)
                <div class="col-md-6 col-lg-6">
                    <div class="featured-article">
                        <a href="/cars/{{ $car->id }}/">
                            <img src="http://placehold.it/482x350" alt="" class="thumb">
                        </a>
                        <div class="block-title">
                            <h2>{{ $car->manufacturer }} {{ $car->model }}</h2>
                            @if($car->member != null)
                                <p class="by-author">
                                    <small>von <a href="/members/{{ $car->member->id }}/">{{ $car->member->firstName }} {{ $car->member->lastName }}</a></small>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /.row -->
        <div class="row">
            {{ $cars->links() }}
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop