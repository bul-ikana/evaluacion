@extends(backpack_view('layouts.plain'))

@section('content')
  <div class="jumbotron ">
    <div class="container">
      <h1 class="display-4">💯 Sistema de evaluación de profesores</h1>
      <p class="lead">Facultad de economía</p>
    </div>
  </div>
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="container">
    <div class="row">
      @foreach($profesores as $profe)
        <div class="col-4">
          <div class="card mx-3">
            <div class="card-body">
              <h5 class="card-title">{{$profe->nombre}} <span class="badge badge-secondary float-right"> {{$profe->promedio}}</span></h5>
              <p class="card-text">Profesor de la facultad de economía.</p>
              <a href="evalua/{{$profe->id}}" class="btn btn-primary">Evalúa</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection