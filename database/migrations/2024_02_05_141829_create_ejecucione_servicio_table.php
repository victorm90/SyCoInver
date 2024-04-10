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
        Schema::create('ejecucione_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ejecucione_id');
            $table->unsignedBigInteger('servicio_id');
            $table->date('fecha');
            $table->string('nfactura');
            $table->decimal('costomcu',8,2);
            $table->decimal('costousd',8,2);                        
            $table->foreign('ejecucione_id')->references('id')->on('ejecuciones')->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecuciones__servicios');
    }
};
