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
        Schema::dropIfExists('kereta');
        Schema::create('kereta', function (Blueprint $table) {
            $table->string('kode')->unique();
            // $table->primary('kode',false);
            $table->string('nama');
            $table->integer('kapasitas');
            $table->integer('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kereta');
    }
};
