@extends(backpack_view('layouts.plain'))

@section('content')
  <a href="/admin/comentario">
    <button type="button" class="btn btn-primary btn-md position-absolute m-3" style="right:0">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path fill="white" d="M12 12q-1.65 0-2.825-1.175Q8 9.65 8 8q0-1.65 1.175-2.825Q10.35 4 12 4q1.65 0 2.825 1.175Q16 6.35 16 8q0 1.65-1.175 2.825Q13.65 12 12 12Zm-8 8v-2.8q0-.85.438-1.563.437-.712 1.162-1.087 1.55-.775 3.15-1.163Q10.35 13 12 13t3.25.387q1.6.388 3.15 1.163.725.375 1.162 1.087Q20 16.35 20 17.2V20Zm2-2h12v-.8q0-.275-.137-.5-.138-.225-.363-.35-1.35-.675-2.725-1.013Q13.4 15 12 15t-2.775.337Q7.85 15.675 6.5 16.35q-.225.125-.362.35-.138.225-.138.5Zm6-8q.825 0 1.413-.588Q14 8.825 14 8t-.587-1.412Q12.825 6 12 6q-.825 0-1.412.588Q10 7.175 10 8t.588 1.412Q11.175 10 12 10Zm0-2Zm0 10Z"/></svg>
    </button>
  </a>
  <div class="jumbotron">
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