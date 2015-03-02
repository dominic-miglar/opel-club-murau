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
                {{ Form::open(array('url' => '/albums/'.$album->id.'/photos/'.$photo->id.'/', 'method' => 'put', 'class' => 'form-horizontal')) }}
                    @if($errors->has('name'))
                    <div class="form-group has-error">
                    @else
                    <div class="form-group">
                    @endif
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-7">
                            {{ Form::text('name', $photo->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    @if($errors->has('description'))
                    <div class="form-group has-error">
                    @else
                    <div class="form-group">
                    @endif
                        <label for="description" class="col-sm-2 control-label">Beschreibung</label>
                        <div class="col-sm-7">
                            {{ Form::text('description', $photo->description, ['class' => 'form-control', 'placeholder' => 'Beschreibung']) }}
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-opel">&Auml;nderungen speichern</button>
                {{ Form::close() }}
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
@stop