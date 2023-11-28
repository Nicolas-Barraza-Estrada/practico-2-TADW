<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use Illuminate\Http\Request;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::paginate(10);
        return response()->json($perros);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto_url' => 'required|url',
            'descripcion' => 'required|string',
        ]);

        $perro = Perro::create($request->all());

        return response()->json(['message' => 'Perro registrado correctamente', 'perro' => $perro], 201);
    }

    public function show(Perro $perro)
    {
        return response()->json($perro);
    }

    public function update(Request $request, Perro $perro)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'foto_url' => 'required|url',
            'descripcion' => 'required|string',
        ];
    
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no debe superar los :max caracteres.',
            'foto_url.required' => 'El campo foto_url es obligatorio.',
            'foto_url.url' => 'El campo foto_url debe ser una URL válida.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.string' => 'El campo descripcion debe ser una cadena de texto.',
        ];
    
        $request->validate($rules, $messages);
    
        $perro = Perro::create($request->all());
    
        return response()->json(['message' => 'Perro registrado correctamente', 'perro' => $perro], 201);
    }

    public function destroy(Perro $perro)
    {
        $perro->delete();

        return response()->json(['message' => 'Perro eliminado correctamente']);
    }
}
