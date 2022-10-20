@extends(backpack_view('layouts.plain'))

@section('content')
  <div class="jumbotron ">
    <div class="container">
      <h1 class="display-4">💯 Sistema de evaluación de profesores</h1>
      <p class="lead">Facultad de economía</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-4">
        <div class="card mx-3">
          <h5 class="card-header bg-primary">Profesor a evaluar</h5>
          <div class="card-body">
            <h5 class="card-title">{{$profesor->nombre}}</h5>
            <p class="card-text">Profesor de la facultad de economía.</p>
          </div>
          </div>
      </div>
      <div class="col-8">
        <form method="POST" action="/evalua/{{$profesor->id}}">
          <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input class="form-control" id="nombre" aria-describedby="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo electronico *</label>
            <input type="email" class="form-control" id="correo" aria-describedby="correo" name="correo" required>
          </div>
          <div class="form-group">
            <label for="calificacion">Calificación *</label>
            <input type="number" id="calificacion" min="0" max="10" step="1" class="form-control" aria-describedby="calificacion" name="calificacion" required>
          </div>
          <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea class="form-control" id="comentario" rows="3" name="comentario"></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right">Enviar</button>
          @csrf
        </form>
        <a href="/"><button class="btn btn-secondary float-right mx-2">Cancelar</button></a>
    </div>
  </div>
  </div>
@endsection