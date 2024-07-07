@extends('layouts.app')

@secion('content')
<form action="{{ route('docentes.index) }}" method="GET">
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
        <a href="{{ route('docentes.create') }}" class="btn btn-secondary">ir a crear</a>
       </div>
    </div> 
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo electronico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($docentes as $docente)
        <tr>
            <td>{{ $docente->nombre}}</td>
            <td>{{ $docente->apellido}}</td>
            <td>{{ $docente->email}}</td>
            <td>{{ $docente->descripcion}}</td>

            <td>
                <table>
                    <td>
                        <a href="{{ route('docentes.edit', $docente->id)">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('docentes.show', $docente->id)">Ver</a>
                    </td>
                    <td>
                        <a href="{{ route('docentes.delete', $docente->id)">Eliminar</a>
                    </td>
                </table>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12">
        {{ $docentes->links()}}
    </div>
</div>
@endsection