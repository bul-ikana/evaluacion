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
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
      {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="container pb-5">
    <div class="row">
      @foreach($profesores as $profe)
        <div class="col-xl-4 col-md-6">
          <div class="card mx-3 mb-0 mt-3">
            <img class="card-img-top" src="{{asset('/img/' . $profe->foto)}}"/>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{$profe->nombre}} <span class="badge badge-secondary float-right"> {{$profe->promedio}}</span></h5>
              <p class="card-text">
                Profesor de la facultad de economía.
                <ul style>
                  @foreach($profe->materias as $materia)
                  <li>{{$materia}}</li>
                  @endforeach
                </ul>
              </p>
              <div class="mt-auto">
                <a href="evalua/{{$profe->id}}" class="btn btn-primary float-right align-bottom">Evalúa</a>
                <a href="#" class="float-left pt-2 align-bottom" data-toggle="collapse" data-target="#collapse{{$profe->id}}" aria-expanded="false" aria-controls="collapse">{{$profe->comentarios->count()}} {{Str::plural('Comentario', $profe->comentarios->count())}}</a>
              </div>
            </div>
          </div>
          @if ($profe->comentarios->count() > 0)
          <div class="collapse" id="collapse{{$profe->id}}">
            <div id="carousel{{$profe->id}}" class="card carousel slide mx-3 mt-2" data-ride="carousel" style="height:250px">
              <div class="card-body carousel-inner">
                @foreach($profe->comentarios as $comentario)
                  @if ($loop->first)
                    <div class="carousel-item active">
                  @else
                    <div class="carousel-item">
                  @endif
                    <h5 class="card-title">{{$comentario->nombre_estudiante}}</h5>
                    <p class="card-text">{{$comentario->comentario }}</p>
                  </div>
                @endforeach
              </div>
              @if ($profe->comentarios->count() > 1)
              <button style="border: 0; height: 20%; background: #444; top: auto" class="carousel-control-prev" type="button" data-target="#carousel{{$profe->id}}" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button style="border: 0; height: 20%; background: #444; top: auto" class="carousel-control-next" type="button" data-target="#carousel{{$profe->id}}" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
              @endif
            </div>
          </div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
@endsection