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
                    <h2 class="blog-post-title">Neues Fahrzeug erstellen</h2>
                    <div class="blog-post-body">
                        @if($errors->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        <form action="/cars/" method="post" class="form-horizontal">
                            @if($errors->has('manufacturer'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="manufacturer" class="col-sm-2 control-label">Hersteller</label>
                                <div class="col-sm-10">
                                    {{ Form::text('manufacturer', Input::old('manufacturer'), ['class' => 'form-control', 'placeholder' => 'Hersteller']) }}
                                    {{ $errors->first('manufacturer') }}
                                </div>
                            </div>
                            @if($errors->has('model'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="model" class="col-sm-2 control-label">Modell</label>
                                <div class="col-sm-10">
                                    {{ Form::text('model', Input::old('model'), ['class' => 'form-control', 'placeholder' => 'Modell']) }}
                                    {{ $errors->first('model') }}
                                </div>
                            </div>
                            @if($errors->has('description'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="description" class="col-sm-2 control-label">Beschreibung</label>
                                <div class="col-sm-10">
                                    {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Beschreibung']) }}
                                    {{ $errors->member->first('description') }}
                                </div>
                            </div>
                            @if($errors->has('horsepower'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="horsepower" class="col-sm-2 control-label">Leistung (PS)</label>
                                <div class="col-sm-10">
                                    {{ Form::number('horsepower', Input::old('horsepower'), ['class' => 'form-control', 'placeholder' => 'Leistung (PS)']) }}
                                    {{ $errors->first('horsepower') }}
                                </div>
                            </div>
                            @if($errors->has('yearBuilt'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="yearBuilt" class="col-sm-2 control-label">Baujahr</label>
                                <div class="col-sm-10">
                                    {{ Form::number('yearBuilt', Input::old('yearBuilt'), ['class' => 'form-control', 'placeholder' => 'Baujahr']) }}
                                    {{ $errors->first('horsepower') }}
                                </div>
                            </div>
                            @if($errors->has('member'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="member" class="col-sm-2 control-label">Besitzer</label>
                                <div class="col-sm-10">
                                    {{ Form::select('member', Member::getSelectSet(), Member::first()->id, ['class' => 'form-control']); }}
                                    {{ $errors->first('member') }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-opel">Fahrzeug erstellen</button>
                        </form>
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
