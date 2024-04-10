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
        Schema::create('instalacione_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instalacione_id');
            $table->unsignedBigInteger('servicio_id');            
            $table->foreign('instalacione_id')->references('id')->on('instalaciones')->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalacione_servicio');
    }
};
