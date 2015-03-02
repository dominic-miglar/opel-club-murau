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
                    <h2 class="blog-post-title">Neuen Artikel hinzufuegen</h2>
                    <div class="blog-post-body">
                        @if($errors->has() || $errors->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        <form action="/news/" method="post" class="form-horizontal">
                            @if($errors->has('slug'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="slug" class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-10">
                                    {{ Form::text('slug', Input::old('slug'), ['class' => 'form-control', 'placeholder' => 'Slug']) }}
                                    {{ $errors->first('slug') }}
                                </div>
                            </div>
                            @if($errors->has('subject'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="slug" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    {{ Form::text('subject', Input::old('subject'), ['class' => 'form-control', 'placeholder' => 'Subject']) }}
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            @if($errors->has('body'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="body" class="col-sm-2 control-label">Body</label>
                                <div class="col-sm-10">
                                    {{ Form::textarea('body', Input::old('body'), ['class' => 'form-control', 'placeholder' => 'Body']) }}
                                    {{ $errors->first('body') }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-opel">Artikel erstellen</button>
                        </form>
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
