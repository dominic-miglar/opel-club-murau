@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">{{ $album->name }}</h3>
                <p class="blog-post-meta">
                    @if(Auth::check())
                        @if(Auth::user()->isWebsiteAdmin())
                            <div class="sidebar-module sidebar-module-inset">
                                <span class="glyphicon glyphicon-plus-sign"></span><a href="/albums/{{ $album->id }}/photos/create/"> Neue Fotos hinzuf&uuml;gen</a>
                            </div>
                        @endif
                    @endif
                </p>
            </div>

            @foreach($photos as $photo)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="/albums/{{ $album->id }}/photos/{{ $photo->id }}/">
                        <img class="img-responsive" src="{{ $photo->getThumbPath() }}">
                    </a>
                </div>
            @endforeach
        </div><!-- /.row -->
        <div class="row">
            {{ $photos->links() }}
            {{--
            <div class="pager">
                <a class="btn btn-opel" href="#"><span class="glyphicon glyphicon-chevron-left"> Previous</span></a>
                <a class="btn btn-opel" href="#">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /.pager -->
            --}}
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop