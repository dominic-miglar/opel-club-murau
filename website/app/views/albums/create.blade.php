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
                    <h2 class="blog-post-title">Neues Fotoalbum erstellen</h2>
                    <div class="blog-post-body">
                        @if($errors->has() || $errors->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        <form action="/albums/" method="post" class="form-horizontal">
                            @if($errors->has('name'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            @if($errors->has('description'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="slug" class="col-sm-2 control-label">Beschreibung</label>
                                <div class="col-sm-10">
                                    {{ Form::text('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Beschreibung']) }}
                                    {{ $errors->first('description') }}
                                </div>
                            </div>
                            @if($errors->member->has('onlySupporting'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="isProjectAlbum" class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('isProjectAlbum') }} Album zu Projekt?
                                        </label>
                                        {{ $errors->member->first('isProjectAlbum') }}
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-opel">Fotoalbum erstellen</button>
                        </form>
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
