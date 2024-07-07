@extends('layouts.app')

@secion('content')
<form action="{{ route('docentes_grupos.index) }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-sm-4">
        <label for="docente_id" class="form-label">Nombre</label>
        <select name="docente_id" class="form-control" required>
              <option value="">Seleccione un docente</option>
              @foreach ($docentes as $docente)
                 <option value="{{ $docente->id }}"> {{ $docente->nombre }} {{ $docente->apellido }}</option>
              @endforeach
           </select>
       </div>
    </div>  
    <br>

    <div class="row">
      <div class="col-md-12">
       <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('docentes_grupos.create') }}" class="btn btn-secondary">ir a crear</a>
       </div>
    </div> 
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Docente</th>
            <th>Grupo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($docentesGrupos as $docenteGrupo)
        <tr>
            <td>{{ $docenteGrupo->docente->nombre }} {{ $docenteGrupo->docente->apellido }}</td>
            <td>{{ $docenteGrupo->grupo->nombre }}</td>

            <td>
                <table>
                    <td>
                        <a href="{{ route('docentes_grupos.edit', $docenteGrupo->id)">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('docentes_grupos.show', $docenteGrupo->id)">Ver</a>
                    </td>
                    <td>
                        <a href="{{ route('docentes_grupos.delete', $docenteGrupo->id)">Eliminar</a>
                    </td>
                </table>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12">
        {{ $docentesGrupos->links()}}
    </div>
</div>
@endsection