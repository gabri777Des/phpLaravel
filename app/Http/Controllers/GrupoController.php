<?php

namespace App\Http\Controllers;

use App\Models\grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    
    public function index()
    {
        $request = grupo::query();

        if ($request->has('nombre')){
            $query->where('nombre','like','%', $request->nombre, '%');
        }
        $grupos - $query->orderBy('id', 'desc')->simplePaginate(10);
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request)
    {
        $grupo = grupo::create($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo creado');
    }

    
    public function show($id)
    {
        $grupo = grupo::find($id);
        if(!$grupo){
            return abort(404);
        }
        return view('grupos.show', compact('grupo'));
    }

    
    public function edit($id)
    {
        $grupo = grupo::find($id);
        if(!$grupo){
            return abort(404);
        }
        return view('grupos.edit', compact('grupo'));
    }

    
    public function update(Request $request, grupo $grupo)
    {
        $grupo = grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        $grupo -> nombre = $request -> nombre;
        $grupo -> descripcion = $request -> descripcion;
        $grupo->save();
        return redirect()->route('grupos.index')->with('sucess', 'Grupo actualizado');

    }

   
    public function delete($id){
        $grupo = grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        return view('grupos.delete', compact('grupo'));

    }

    public function destroy(grupo $grupo)
    {
        $grupo = grupo::find($id);
        if(!$grupo){
            return abort(404);
        }
        $grupo->delete();
        return redirect()->route('grupos.index')->with('sucess', 'Grupo eliminado');

    }
}
