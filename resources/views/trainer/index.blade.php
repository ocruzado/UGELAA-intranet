@extends('layouts.app')

@section('title', 'Traines - Index')

@section('content')
    <div class="row">
        @foreach($trainer as $trainer)
            <div class="col-sm">
                <div class="card text-center" style="width: 18em; margin-top: 70px">
                    <img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;"
                         src="images/{{$trainer->avatar}}"
                         class="card-img-top rounded-circle mx-auto d-block">
                    <div class="card-body">
                        <h5 class="card-title">{{$trainer->nombre}}</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, voluptates?
                        </p>
                        <a href="/trainer/{{$trainer->slug}}" class="btn btn-primary">Ver más...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection