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
            $table->text('detalle',170)->nullable();
            /* $table->integer('codigo');
            $table->enum('tipo',['N','RNN'])->default('RNN');            
            $table->unsignedBigInteger('importadore_id');
            $table->unsignedBigInteger('organismo_id');
            $table->unsignedBigInteger('empresa_id');
            $table->enum('tipo_ejecion',['NUEVA','CONTINUACION','MEJORAS'])->default('NUEVA');            
            $table->foreign('importadore_id')->references('id')->on('importadores')->onUpdate('cascade');
            $table->foreign('organismo_id')->references('id')->on('organismos')->onUpdate('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade'); */
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
