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
        Schema::create('desagregaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');            
            $table->decimal('costoMN',10,2);
            $table->decimal('costoUSD',10,2);
            $table->unsignedBigInteger('instalacione_id');
            $table->unsignedBigInteger('ejecutor_id');
            $table->unsignedBigInteger('servicio_id');                        
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade');                        
            $table->foreign('ejecutor_id')->references('id')->on('ejecutors')->onUpdate('cascade');                        
            $table->foreign('instalacione_id')->references('id')->on('instalaciones')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desagregaciones');
    }
};
