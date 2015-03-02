@extends('layout.master')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/dropzone.min.css" />
    <script src="/packages/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.photoupload = {
            accept: function(file, done) {
                console.log(file);
                if (file.type != "image/jpeg") {
                    done("Error! Files of this type are not accepted");
                }
                else { done(); }
            }
        }
    </script>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title">Neue Fotos hinzufügen</h2>
                    <div class="blog-post-body">
                        @if($errors->has() || $errors->has())
                            <p style="color: #FDBE0F">Es sind Fehler in deinen Eingaben, bitte kontrolliere diese noch einmal!</p>
                        @endif
                        <p></p>
                        <form action="/albums/{{ $album->id }}/photos/" class="dropzone dz-clickable" id="photoupload">
                            <div class="dz-message">
                                Drop files here or click to upload.<br />
                                <span class="note">Die Fotos werden sofort auf den Server hochgeladen.</span>
                            </div>
                        </form>
                    </div>
                    <br>
                    <p><a href="/albums/{{ $album->id }}/photos/">Zur&uuml;ck zum Album</a></p>
                </div> <!-- /.blog-post -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@stop
