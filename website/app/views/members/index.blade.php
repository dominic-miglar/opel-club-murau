@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <h3 class="membergroup-descr">Organe des Vereins</h3>
                <div class="row placeholders">
                    @foreach($managingCommitteeMembers as $member)
                        <a href="/members/{{ $member->id }}/">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                @if($member->photo != null)
                                    <img src="{{ $member->photo->getThumbPath() }}" class="img-responsive" alt="Photo of member">
                                @else
                                    <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                                @endif
                                <h4>{{ $member->lastName }}<br />{{ $member->firstName }}</h4>
                                <span class="text-muted">{{ $member->role }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <h3 class="membergroup-descr">Mitglieder</h3>
                <div class="row placeholders">
                    @foreach($members as $member)
                        <a href="/members/{{ $member->id }}/">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>{{ $member->lastName }}<br />{{ $member->firstName }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
                <h3 class="membergroup-descr">Unterstützende Mitglieder</h3>
                <div class="row placeholders">
                    @foreach($onlySupportingMembers as $member)
                        <a href="/members/{{ $member->id }}/">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>{{ $member->lastName }}<br />{{ $member->firstName }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div><!-- /.blog-main -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @if(Auth::check())
                    @if(Auth::user()->isWebsiteAdmin())
                        <div class="sidebar-module sidebar-module-inset">
                            <span class="glyphicon glyphicon-plus-sign"></span><a href="/members/create/"> Neues Mitglied erstellen</a>
                        </div>
                    @endif
                @endif
                <div class="sidebar-module sidebar-module-inset">
                    <h4>
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                <a href="/description/{{ $membersArticle->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </h4>
                    {{ $membersArticle->body }}
                </div>
                <div class="sidebar-module">
                    <h4>Organe des Vereins</h4>
                    <ol class="list-unstyled">
                        @foreach($managingCommitteeMembers as $member)
                            <li><a href="/members/{{ $member->id }}/">{{ $member->lastName }} {{ $member->firstName }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Mitglieder</h4>
                    <ol class="list-unstyled">
                        @foreach($members as $member)
                            <li><a href="/members/{{ $member->id }}/">{{ $member->lastName }} {{ $member->firstName }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Unterstützende Mitglieder</h4>
                    <ol class="list-unstyled">
                        @foreach($onlySupportingMembers as $member)
                            <li><a href="/members/{{ $member->id }}/">{{ $member->lastName }} {{ $member->firstName }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop