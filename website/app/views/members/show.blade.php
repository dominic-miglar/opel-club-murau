@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#">
                                @if($member->photo != null)
                                    <img class="img-responsive" src="{{ $member->photo->getThumbPath() }}">
                                @else
                                    <img class="img-responsive" src="http://placehold.it/550x600">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-6">
                            <h2 class="blog-post-title">{{ $member->firstName }} {{ $member->lastName }}</h2>
                            <p class="blog-post-meta">
                                {{ $member->role }}
                            </p>
                            {{ $member->welcomeText }}
                        </div>
                    </div><!-- /.row -->
                    <h3>Autos</h3>
                    @foreach($member->cars as $car)
                        <div class="row carlist">
                            <div class="col-lg-7 col-md-7">
                                <a class="thumbnail" href="#">
                                    @if($car->album->titlePhoto != null)
                                        <img class="img-responsive" src="{{ $car->album->titlePhoto->getPath() }}" alt="titlePhoto">
                                    @else
                                        <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                                    @endif
                                </a>
                                <!-------------------->
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <h3>{{ $car->manufacturer }} {{ $car->model }}</h3>
                                <div class="btn-opel-hover">
                                    <a class="btn btn-opel btn-opel-hover" href="/cars/{{ $car->id }}/">
                                        Mehr Informationen <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    @endforeach
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @if(Auth::check())
                    @if(Auth::user()->isWebsiteAdmin())
                        <div class="sidebar-module sidebar-module-inset">
                            <a href="/members/{{ $member->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Mitgliedsprofil bearbeiten</a>
                        </div>
                    @endif
                @endif
                <div class="sidebar-module sidebar-module-inset">
                    <h4>{{ $member->firstName }} {{ $member->lastName }}</h4>
                    <p>
                        {{ \Carbon\Carbon::parse($member->birthdate)->age }} Jahre alt<br />
                        {{ $member->job }}, <em>{{ $member->employer }}</em><br />
                        Mitglied seit {{ $member->memberSince }}
                    </p>
                </div>
                <div class="sidebar-module">
                    {{ $member->description }}
                </div>
                <div class="sidebar-module">
                    <h4>Autos</h4>
                    <ol class="list-unstyled">
                        @foreach($member->cars as $car)
                            <li><a href="/cars/{{ $car->id }}/">{{ $car->model }}</a></li>
                        @endforeach
                    </ol>
                </div>
                @if($member->telephoneNumber && $member->email)
                    <div class="sidebar-module">
                        <h4>Kontakt</h4>
                        @if($member->telephoneNumber)
                            <p>
                                <em>Tel.:</em><br />{{ $member->telephoneNumber }}
                            </p>
                        @endif
                        @if($member->email)
                            <p>
                                <em>E-Mail:</em><br />{{ $member->email }}
                            </p>
                        @endif
                    </div>
                @endif
                @if($member->facebookLink)
                    <div class="sidebar-module">
                        <h4>Ich bin auch auf..</h4>
                        <ol class="list-unstyled">
                            <li><a href="{{ $member->facebookLink }}">Facebook</a></li>
                        </ol>
                    </div>
                @endif
            </div><!-- /.blog-sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop