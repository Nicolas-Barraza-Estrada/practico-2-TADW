<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Perro;

class PerroSeeder extends Seeder
{
    public function run()
    {
        // Especifica la cantidad de perros que deseas crear
        $cantidadPerros = 10;

        for ($i = 0; $i < $cantidadPerros; $i++) {
            $response = Http::get('https://dog.ceo/api/breeds/image/random');

            if ($response->successful()) {
                $data = $response->json();
                $imagenUrl = $data['message'];

                // Generar nombre y descripción aleatorios
                $nombre = ucfirst(Str::random(6)); // Utiliza tu propia lógica para generar nombres
                $descripcion = ucfirst(Str::random(20)); // Utiliza tu propia lógica para generar descripciones

                Perro::create([
                    'nombre' => $nombre,
                    'foto_url' => $imagenUrl,
                    'descripcion' => $descripcion,
                ]);
            }
        }
    }
}
