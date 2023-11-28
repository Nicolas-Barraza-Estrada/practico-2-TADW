<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perro extends Model
{
    use HasFactory,SoftDeletes;

    // No deberías tener la función up() en el modelo. Esa función pertenece a las migraciones.
    protected $fillable = ['nombre', 'foto_url', 'descripcion'];
    public function interaccionesInteresado()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }

    public function interaccionesCandidato()
    {
        return $this->hasMany(Interaccion::class, 'perro_candidato_id');
    }
}
