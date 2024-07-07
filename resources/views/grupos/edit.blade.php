@extends('layouts.app')

@section('content')

<form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
    @csrf
    <div class="row">
      <div class="row">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $grupo->nombre }}">
       </div>
    </div> 

    <div class="row">
      <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ $grupo->descripcion }}</textarea>
       </div>
    </div> 
    <br>

    <div class="row">
      <div class="col-md-12">
       <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
       </div>
    </div> 
</form>
@endsection