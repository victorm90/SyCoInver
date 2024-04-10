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
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('addres',100);
            $table->integer('creeup')->unique();
            $table->integer('telefono')->nullable();
            $table->string('email',100)->nullable();
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades');
    }
};
