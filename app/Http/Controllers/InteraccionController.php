<?php

namespace App\Http\Controllers;

// En el controlador InteraccionController.php

use App\Models\Interaccion;
use App\Models\Perro;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{
    public function guardarPreferencias(Request $request)
    {
        $request->validate([
            'perro_interesado_id' => 'required|exists:perros,id',
            'perro_candidato_id' => 'required|exists:perros,id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ]);

        // Crear la interacción
        $interaccion = Interaccion::create($request->all());

        // Verificar si hay un match
        $hayMatch = $this->verificarMatch($interaccion);

        if ($hayMatch) {
            return response()->json(['message' => '¡Hay match!']);
        }else{
            return response()->json(['message' => 'OK']);
        }
    }

    private function verificarMatch($interaccion)
    {   
        // Obtener información sobre la interacción
        $perroInteresadoId = $interaccion->perro_interesado_id;
        $perroCandidatoId = $interaccion->perro_candidato_id;
        // Verificar si la interacción es mutua (match)
        $interaccionMutua = Interaccion::where('perro_interesado_id', $perroCandidatoId)
            ->where('perro_candidato_id', $perroInteresadoId)
            ->exists();

        return $interaccionMutua;
    }
}
