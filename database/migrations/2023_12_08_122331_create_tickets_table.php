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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('dari');
            $table->string('ke');
            $table->dateTime('tanggal_pergi');
            $table->string('id_kereta');
            $table->foreign('id_kereta')->references('kode')->on('kereta');
            $table->foreignId('id_jadwal')->constrained('jadwal');
            $table->integer('jumlah');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
