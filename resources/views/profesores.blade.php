@extends(backpack_view('layouts.plain'))
@section('content')

@php
  use App\Models\Profesor;
  $profes = Profesor::all();
@endphp

<div class="jumbotron ">
  <div class="container">
    <h1 class="display-4">💯 Sistema de evaluación de profesores</h1>
    <p class="lead">Facultad de economía</p>
  </div>
</div>

<div class="container">
  <div class="row ">
    @foreach($profes as $profe)
      <div class="col-4">
        <div class="card mx-3">
          <div class="card-body">
            <h5 class="card-title">{{$profe->nombre}} <span class="badge badge-secondary float-right"> {{$profe->promedio}}</span></h5>
            <p class="card-text">Profesor de la facultad de economía.</p>
            <a href="#" class="btn btn-primary">Evalúa</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection