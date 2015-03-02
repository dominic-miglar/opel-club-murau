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
                    <h2 class="blog-post-title">Artikel bearbeiten</h2>
                    <p class="blog-post-meta">{{ $article->slug }}</p>
                    <div class="blog-post-body">
                        @if($errors->has() || $errors->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        {{ Form::open(array('url' => '/about/'.$article->id.'/', 'method' => 'put', 'class' => 'form-horizontal')) }}
                            {{ Form::hidden('slug', $article->slug) }}
                            @if($errors->has('subject'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label for="subject" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    {{ Form::text('subject', $article->subject, ['class' => 'form-control', 'placeholder' => 'Subject']) }}
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
                                    {{ Form::textarea('body', $article->body, ['class' => 'form-control', 'placeholder' => 'Body']) }}
                                    {{ $errors->first('body') }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-opel">Artikel speichern</button>
                        {{ Form::close() }}
                                <br />
                        @if($article->locked == false)
                        {{ Form::open(array('url' => '/about/'.$article->id.'/', 'method' => 'delete', 'class' => 'form-horizontal')) }}
                            <button type="submit" class="btn btn-danger">Artikel löschen (kann nicht rueckgaengig gemacht werden!)</button>
                        {{ Form::close() }}
                        @endif
                    </div>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
