@extends('layout.master')

@section('head')
    <script src="/packages/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
        });
    </script>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title">Neues Mitglied hinzufuegen</h2>
                    <div class="blog-post-body">
                        @if($errors->user->has() || $errors->member->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        <form action="/members/" method="post" class="form-horizontal">
                            @if($errors->user->has('username'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Username']) }}
                                    {{ $errors->user->first('username') }}
                                </div>
                            </div>
                            <h3>Persoenliche Daten</h3>
                            @if($errors->member->has('firstName'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="firstName" class="col-sm-2 control-label">Vorname</label>
                                <div class="col-sm-10">
                                    {{ Form::text('firstName', Input::old('firstName'), ['class' => 'form-control', 'placeholder' => 'Vorname']) }}
                                    {{ $errors->member->first('firstName') }}
                                </div>
                            </div>
                            @if($errors->member->has('lastName'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="lastName" class="col-sm-2 control-label">Nachname</label>
                                <div class="col-sm-10">
                                    {{ Form::text('lastName', Input::old('lastName'), ['class' => 'form-control', 'placeholder' => 'Nachname']) }}
                                    {{ $errors->member->first('lastName') }}
                                </div>
                            </div>
                            @if($errors->member->has('birthdate'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="birthdate" class="col-sm-2 control-label">Geburtsdatum</label>
                                <div class="col-sm-10">
                                    {{Form::text('birthdate', Input::old('birthdate'), ['class' => 'form-control', 'placeholder' => 'Geburtsdatum']) }}
                                    {{ $errors->member->first('birthdate') }}
                                </div>
                            </div>

                            <h3>Kontaktdaten</h3>
                            @if($errors->member->has('email'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="email" class="col-sm-2 control-label">E-Mail Adresse</label>
                                <div class="col-sm-10">
                                    {{Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'E-Mail Adresse']) }}
                                    {{ $errors->member->first('email') }}
                                </div>
                            </div>
                            @if($errors->member->has('telephoneNumber'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="telephoneNumber" class="col-sm-2 control-label">Telefonnummer</label>
                                <div class="col-sm-10">
                                    {{ Form::text('telephoneNumber', Input::old('telephoneNumber'), ['class' => 'form-control', 'placeholder' => 'Telefonnummer']) }}
                                    {{ $errors->member->first('telephoneNumber') }}
                                </div>
                            </div>
                            @if($errors->member->has('facebookLink'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="facebookLink" class="col-sm-2 control-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    {{ Form::text('facebookLink', Input::old('facebookLink'), ['class' => 'form-control', 'placeholder' => 'Facebook Link']) }}
                                    {{ $errors->member->first('facebookLink') }}
                                </div>
                            </div>

                            <h3>Clubspezifische Informationen</h3>
                            @if($errors->member->has('role'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="role" class="col-sm-2 control-label">Rolle (wenn in Vorstand)</label>
                                <div class="col-sm-10">
                                    {{ Form::text('role', Input::old('role'), ['class' => 'form-control', 'placeholder' => 'Rolle (wenn in Vorstand)']) }}
                                    {{ $errors->member->first('role') }}
                                </div>
                            </div>
                            @if($errors->member->has('welcomeText'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="welcomeText" class="col-sm-2 control-label">Willkommenstext</label>
                                <div class="col-sm-10">
                                    {{ Form::textarea('welcomeText', Input::old('welcomeText'), ['class' => 'form-control', 'placeholder' => 'Willkommenstext']) }}
                                    {{ $errors->member->first('welcomeText') }}
                                </div>
                            </div>
                            @if($errors->member->has('description'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="description" class="col-sm-2 control-label">Beschreibung / Motto</label>
                                <div class="col-sm-10">
                                    {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Beschreibung / Motto']) }}
                                    {{ $errors->member->first('description') }}
                                </div>
                            </div>
                            @if($errors->member->has('memberSince'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="memberSince" class="col-sm-2 control-label">Mitglied seit (Jahr)</label>
                                <div class="col-sm-10">
                                    {{ Form::number('memberSince', Input::old('memberSince'), ['class' => 'form-control', 'placeholder' => 'Mitglied seit (Jahr)']) }}
                                    {{ $errors->member->first('memberSince') }}
                                </div>
                            </div>
                            @if($errors->member->has('onlySupporting'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="onlySupporting" class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('onlySupporting') }} Unterstuetzendes Mitglied
                                        </label>
                                        {{ $errors->member->first('onlySupporting') }}
                                    </div>
                                </div>
                            </div>

                            <h3>Arbeit</h3>
                            @if($errors->member->has('job'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="job" class="col-sm-2 control-label">Beruf</label>
                                <div class="col-sm-10">
                                    {{ Form::text('job', Input::old('job'), ['class' => 'form-control', 'placeholder' => 'Beruf']) }}
                                    {{ $errors->member->first('job') }}
                                </div>
                            </div>
                            @if($errors->member->has('employer'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="employer" class="col-sm-2 control-label">Arbeitgeber</label>
                                <div class="col-sm-10">
                                    {{ Form::text('employer', Input::old('employer'), ['class' => 'form-control', 'placeholder' => 'Arbeitgeber']) }}
                                    {{ $errors->member->first('employer') }}
                                </div>
                            </div>
                            @if($errors->member->has('isWebsiteAdmin'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="isWebsiteAdmin" class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('isWebsiteAdmin') }} Administrator der Webseite
                                        </label>
                                        {{ $errors->member->first('isWebsiteAdmin') }}
                                    </div>
                                </div>
                            </div>
                            @if($errors->user->has('password'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="password" class="col-sm-2 control-label">Passwort</label>
                                <div class="col-sm-10">
                                    {{ Form::password('password', $attributes=['class' => 'form-control', 'placeholder' => 'Passwort']) }}
                                    {{ $errors->user->first('password') }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-opel">Mitglied erstellen</button>
                        </form>
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
