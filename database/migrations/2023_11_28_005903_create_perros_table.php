<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // en el archivo de migración de Perro
    public function up()
    {
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('foto_url');
            $table->text('descripcion');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perros');
    }
};
