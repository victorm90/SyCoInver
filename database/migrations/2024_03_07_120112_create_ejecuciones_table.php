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
        Schema::create('ejecuciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entidade_id');
            $table->unsignedBigInteger('instalacione_id');
            $table->unsignedBigInteger('ejecutor_id');
            $table->unsignedBigInteger('obra_id');
            $table->unsignedBigInteger('gasto_id');            
            $table->string('costototal');
            $table->foreign('entidade_id')->references('id')->on('entidades')->onUpdate('cascade');
            $table->foreign('instalacione_id')->references('id')->on('instalaciones')->onUpdate('cascade');
            $table->foreign('ejecutor_id')->references('id')->on('ejecutors')->onUpdate('cascade');
            $table->foreign('obra_id')->references('id')->on('obras')->onUpdate('cascade'); 
            $table->foreign('gasto_id')->references('id')->on('gastos')->onUpdate('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecuciones');
    }
};
