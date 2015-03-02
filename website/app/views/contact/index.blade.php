@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                @if(isset($message))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
                @endif
                <div class="contactform">
                    <form class="form-horizontal" action="/contact/" method="post">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Dein Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" placeholder="Dein Name" class="form-control">
                                </div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Deine E-mail</label>
                                <div class="col-md-9">
                                    <input id="email" name="email" type="text" placeholder="Deine E-mail" class="form-control">
                                </div>
                            </div>
                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="msgBody">Deine Nachricht</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="msgBody" name="msgBody" placeholder="Wieso willst du Kontakt mit uns aufnehmen?" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-opel btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- /.blog-main -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>
                        {{ $contactArticle->subject }}
                        @if(Auth::check())
                            @if(Auth::user()->isWebsiteAdmin())
                                <a href="/description/{{ $contactArticle->id }}/edit/"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
                            @endif
                        @endif
                    </h4>
                    {{ $contactArticle->body }}
                </div>
                <div class="sidebar-module">
                    <h4>Finde uns auch auf...</h4>
                    <ol class="list-unstyled">
                        @foreach($socialNetworks as $socialNetwork)
                            <li><a href="{{ $socialNetwork->link }}" target="_blank">{{ $socialNetwork->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="sidebar-module">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2717.7139274082597!2d14.434212599999997!3d47.065461799999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47704eeacf2f16a1%3A0x626473d9f34c1517!2sSt.+Georgen+bei+Neumarkt+132%2C+8820+St.+Georgen+bei+Neumarkt!5e0!3m2!1sde!2sat!4v1423780879619" width="400" height="300" frameborder="0" style="border:0"></iframe>
                </div>
            </div><!-- /.blog-sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop