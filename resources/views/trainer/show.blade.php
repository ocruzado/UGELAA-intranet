@extends('layouts.app')

@section('title', 'Traine')

@section('content')

    @include('partial.success')

    <img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;"
         src="/images/{{$trainer->avatar}}"
         class="card-img-top rounded-circle mx-auto d-block">

    <div class="text-center">
        <h5 class="card-title">{{$trainer->nombre}}</h5>
        <h5 class="card-title">{{$trainer->slug}}</h5>
        <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda atque corporis, culpa dicta
            dolorem doloribus eaque error ex excepturi exercitationem expedita illo incidunt iste itaque iusto
            laboriosam magnam maiores maxime modi molestias necessitatibus obcaecati odio possimus quas quia quod
            ratione recusandae rem saepe soluta tempora veritatis vero voluptatem voluptates.
        </p>
        <a href="/trainer/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>

        {!! Form::open(['route'=>['trainer.destroy', $trainer->slug], 'method' => 'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class' =>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection