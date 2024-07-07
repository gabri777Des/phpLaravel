@extends('layouts.app')

@secion('content')
<form action="{{ route('grupos.index) }}" method="GET">
    @csrf
    <div class="row">
      <div class="row">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
       </div>
    </div>  
    <br>

    <div class="row">
      <div class="col-md-12">
       <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('grupos.create') }}" class="btn btn-secondary">ir a crear</a>
       </div>
    </div> 
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grupos as $grupo)
        <tr>
            <td>{{ $grupo->nombre}}</td>
            <td>{{ $grupo->descripcion}}</td>

            <td>
                <table>
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->id)">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('grupos.show', $grupo->id)">Ver</a>
                    </td>
                    <td>
                        <a href="{{ route('grupos.delete', $grupo->id)">Eliminar</a>
                    </td>
                </table>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12">
        {{ $grupos->links()}}
    </div>
</div>
@endsection