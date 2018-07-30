@extends('layouts.app')

@section('title', 'Traines - Edit')

@section('content')

    {!! Form::model($trainer, ['route'=>['trainer.update', $trainer], 'method' => 'PUT', 'files' => true]) !!}

    @include('trainer.form');

    {!! Form::submit('ACTUALIZAR', ['class', 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection