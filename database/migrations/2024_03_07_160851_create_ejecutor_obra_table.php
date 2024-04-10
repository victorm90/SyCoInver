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
        Schema::create('ejecutor_obra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obra_id');
            $table->unsignedBigInteger('ejecutor_id');
            $table->date('fecha');
            $table->decimal('costomcu',8,2);
            $table->decimal('costousd',8,2);             
            $table->foreign('obra_id')->references('id')->on('obras')->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('ejecutor_id')->references('id')->on('ejecutors')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecutor_obra');
    }
};
