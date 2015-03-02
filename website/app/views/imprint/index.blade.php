@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $article->subject }}</h2>
                    <p class="blog-post-meta">
                        {{ date("d F Y",strtotime($article->created_at)) }} at {{ date("g:ha",strtotime($article->created_at)) }}
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                | <a href="/description/{{ $article->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </p>
                    <div class="blog-post-body">
                        {{ $article->body }}
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop

