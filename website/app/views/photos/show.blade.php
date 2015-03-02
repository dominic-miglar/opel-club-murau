@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">{{ $photo->name }}</h3>
            </div>

            <div class="col-lg-3 thumb">
                <a class="thumbnail" href="/albums/{{ $album->id }}/photos/{{ $photo->id }}/">
                    <img class="img-responsive" src="{{ $photo->getThumbPath() }}">
                </a>
            </div>
            <div class="col-lg-9">
                <table class="table table-responsive">
                    <tr>
                        <th>Name</th>
                        <td>{{ $photo->name }}</td>
                    </tr>
                    <tr>
                        <th>Beschreibung</th>
                        <td>{{ $photo->description }}</td>
                    </tr>
                    @if(Auth::check())
                        @if(Auth::user()->isWebsiteAdmin())
                            <tr>
                                <th>Pfad zur Bilddatei</th>
                                <td>{{ $photo->getPath() }}</td>
                            </tr>
                            <tr>
                                <th>Pfad zur Thumbnaildatei</th>
                                <td>{{ $photo->getThumbPath() }}</td>
                            </tr>
                        @endif
                    @endif
                    <tr>
                        <th>
                            <a href="{{ $photo->getPath() }}">Originales Bild anzeigen</a>
                        </th>
                        <td>
                        </td>
                    </tr>
                </table>
                @if(Auth::check())
                    @if(Auth::user()->isWebsiteAdmin())
                        <a class="btn btn-opel" href="/albums/{{ $album->id }}/photos/{{ $photo->id }}/edit/">Foto bearbeiten</a>
                        {{ Form::open(array('url' => '/albums/'.$album->id.'/photos/'.$photo->id.'/', 'method' => 'delete', 'class' => 'form-horizontal')) }}
                        <button type="submit" class="btn btn-danger">Foto löschen (kann nicht rueckgaengig gemacht werden!)</button>
                        {{ Form::close() }}
                    @endif
                @endif
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->
@stop