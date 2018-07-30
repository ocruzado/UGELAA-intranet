@extends('layouts.app')

@section('title', 'Traines - Create')

@section('content')

    @include('partial.errors');


    {!! Form::open(['route'=>'trainer.store', 'method'=>'POST', 'files'=>true]) !!}

    @include('trainer.form')

    {{--    {!! Form::submit('Guardar', ['class', 'btn btn-primary']) !!}--}}
    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection