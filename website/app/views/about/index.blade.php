@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Carousel BEGIN -->
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    @if($aboutAlbum->photos()->first() != null)
                    <div class="item active">
                        <img src="{{ $aboutAlbum->photos()->first()->getPath() }}" alt="Slide1">
                    </div>
                    @endif
                    @foreach($aboutAlbum->photos as $photo)
                    <div class="item">
                        <img src="{{ $photo->getPath() }}" alt="Slide2">
                    </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="fa fa-chevron-left fa-2x"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="fa fa-chevron-right fa-2x"></span>
                </a>
            </div> <!-- /.carousel -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                @foreach($articles as $article)
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $article->subject }}</h2>
                        <p class="blog-post-meta">
                            {{ date("d F Y",strtotime($article->created_at)) }} at {{ date("g:ha",strtotime($article->created_at)) }}, geschrieben von <a href="/members/{{ $article->member->id }}/">{{ $article->member->firstName }} {{ $article->member->lastName }}</a>
                            @if(Auth::check())
                                @if(Auth::user()->isWebsiteAdmin())
                                    | <a href="/about/{{ $article->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                                @endif
                            @endif
                        </p>
                        {{ $article->body }}
                    </div>
                @endforeach
            </div> <!-- /.blog-main -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @if(Auth::check())
                    @if(Auth::user()->isWebsiteAdmin())
                        <div class="sidebar-module sidebar-module-inset">
                            <span class="glyphicon glyphicon-plus-sign"></span><a href="/about/create/"> Neuen Artikel erstellen</a><br />
                            <span class="glyphicon glyphicon-plus-sign"></span><a href="/albums/{{ $aboutAlbum->id }}/photos/create/"> Fotos zu Slider hinzuf&uuml;gen</a>
                        </div>
                    @endif
                @endif
                <div class="sidebar-module sidebar-module-inset">
                    <h4>
                        {{ $aboutArticle->subject }}
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                <a href="/description/{{ $aboutArticle->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </h4>
                    {{ $aboutArticle->body }}
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        @foreach($socialNetworks as $socialNetwork)
                            <li><a href="{{ $socialNetwork->link }}">{{ $socialNetwork->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Mitglieder</h4>
                    <ol class="list-unstyled">
                        @foreach($members as $member)
                            <li><a href="/members/{{ $member->id }}/">{{ $member->firstName }} {{ $member->lastName }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Unterstützende Mitglieder</h4>
                    <ol class="list-unstyled">
                        @foreach($membersOnlySupporting as $member)
                            <li><a href="/members/{{ $member->id }}/">{{ $member->firstName }} {{ $member->lastName }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->
        </div> <!-- /.row -->
    </div><!-- /.container -->
@stop