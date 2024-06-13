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
        Schema::create('registions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->string('name');
            $table->string('surname');
            $table->string('year');
            $table->string('experience');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registions');
    }
};
