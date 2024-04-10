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
        Schema::create('ejecutors', function (Blueprint $table) {
            $table->id();
            $table->string('name',70)->unique();
            $table->string('addres',100)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('ncontrato',10)->unique();
            $table->date('fecha_cont');
            $table->decimal('valorhidden',8,2);
            $table->date('fecha_ven_cont');
            $table->integer('dayoff');          
            $table->boolean('estado')->default(true);
            $table->text('detalle',150)->nullable();
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onUpdate('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecutors');
    }
};
