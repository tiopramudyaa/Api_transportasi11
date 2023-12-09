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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('id_kereta');
            $table->foreign('id_kereta')->references('kode')->on('kereta');
            $table->DateTime('tanggal');
            $table->integer('harga');
            $table->string('berangkat');
            $table->string('tiba');
            $table->tinyInteger('status');
            $table->integer('kursi');
            $table->time('jam_berangkat');
            $table->time('jam_tiba');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
