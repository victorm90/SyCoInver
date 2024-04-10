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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('name',70)->unique();
            $table->unsignedBigInteger('instalacione_id');                       
            $table->unsignedBigInteger('tipobra_id');            
            $table->unsignedBigInteger('codigo_inversione_id')->nullable();
            $table->unsignedBigInteger('importadore_id')->nullable();
            $table->unsignedBigInteger('organismo_id')->nullable();
            $table->decimal('valorplan',8,2);
            $table->decimal('valorhidden',8,2);
            $table->text('detalle',170)->nullable();
            $table->foreign('importadore_id')->references('id')->on('importadores')->onUpdate('cascade');
            $table->foreign('codigo_inversione_id')->references('id')->on('codigo_inversiones')->onUpdate('cascade'); 
            $table->foreign('tipobra_id')->references('id')->on('tipobras')->onUpdate('cascade');           
            $table->foreign('instalacione_id')->references('id')->on('instalaciones')->onUpdate('cascade');
            $table->foreign('organismo_id')->references('id')->on('organismos')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
