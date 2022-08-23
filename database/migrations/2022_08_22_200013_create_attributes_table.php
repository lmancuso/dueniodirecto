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
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('cascade');
            $table->integer('mts');
            $table->integer('ambientes');
            $table->integer('dormitorios');
            $table->integer('banos');
            $table->integer('antiguedad');
            $table->integer('cochera');
            $table->boolean('duenio_directo');
            $table->boolean('inmobiliaria');
            $table->boolean('apto_profesional');
            $table->boolean('agua_corriente');
            $table->boolean('aire_acondicionado');
            $table->boolean('cloacas');
            $table->boolean('electricidad');
            $table->boolean('gas');
            $table->boolean('pavimento');
            $table->boolean('pileta');
            $table->boolean('telefono');
            $table->boolean('cable');
            $table->boolean('amueblado');
            $table->boolean('baulera');
            $table->boolean('dependencia');
            $table->boolean('lavadero');
            $table->boolean('terraza');
            $table->boolean('balcon');
            $table->boolean('patio');
            $table->boolean('jardin');
            $table->boolean('parrilla');
            $table->boolean('solarium');
            $table->boolean('sum');
            $table->boolean('playroom');
            $table->boolean('encargado_vigilancia');
            $table->boolean('ascensor');
            $table->boolean('mob_reducida');
            $table->boolean('seguro_caucion');
            $table->boolean('acepta_recibo');
            $table->boolean('mascotas');
            $table->boolean('apto_credito');
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
        Schema::dropIfExists('attributes');
    }
};
