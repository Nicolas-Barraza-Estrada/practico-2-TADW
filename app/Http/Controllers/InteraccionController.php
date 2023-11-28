<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaccion;

class InteraccionController extends Controller
{
    public function guardarPreferencias(Request $request)
    {
        $request->validate([
            'perro_interesado_id' => 'required|exists:perros,id',
            'perro_candidato_id' => 'required|exists:perros,id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ]);

        Interaccion::create($request->all());

        return response()->json(['message' => 'Preferencia guardada correctamente']);
    }
}

