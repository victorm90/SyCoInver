<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instalaciones', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('cadena_id');
            $table->foreign('cadena_id')->references('id')->on('cadenas')->onUpdate('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onUpdate('cascade');
            $table->text('detalle',150)->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalaciones');
    }
};
