@extends('layout.master')

@section('content')
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
                                    | <a href="/news/{{ $article->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                                @endif
                            @endif
                        </p>
                        <div class="blog-post-body">
                            {{ $article->body }}
                        </div>
                    </div> <!-- /.blog-post -->
                @endforeach
                {{ $articles->links() }}
            </div>

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @if(Auth::check())
                    @if(Auth::user()->isWebsiteAdmin())
                        <div class="sidebar-module sidebar-module-inset">
                            <span class="glyphicon glyphicon-plus-sign"></span><a href="/news/create/"> Neuen Artikel erstellen</a>
                        </div>
                    @endif
                @endif
                <div class="sidebar-module sidebar-module-inset">
                    <h4>
                        {{ $welcomeArticle->subject }}
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                <a href="/description/{{ $welcomeArticle->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </h4>
                    <div>
                        {{ $welcomeArticle->body }}
                    </div>
                </div>
                <div class="sidebar-module">
                    <h4>Wir sind auch auf..</h4>
                    <ol class="list-unstyled">
                        @foreach($socialNetworks as $socialNetwork)
                            <li><a href="{{ $socialNetwork->link }}" target="_blank">{{ $socialNetwork->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Unsere Sponsoren</h4>
                    <ul class="list-unstyled">
                        @foreach($sponsors as $sponsor)
                            <li><a href="/sponsors/{{ $sponsor->id }}/">{{ $sponsor->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop