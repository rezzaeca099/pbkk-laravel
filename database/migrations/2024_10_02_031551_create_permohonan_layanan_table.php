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
        Schema::create('permohonan_layanan', function (Blueprint $table) {
            $table->id(); // Kolom ID utama
            $table->string('layanan'); // Kolom untuk layanan
            $table->string('nama'); // Kolom untuk nama pemohon
            $table->string('jabatan'); // Kolom untuk jabatan
            $table->string('skpd'); // Kolom untuk SKPD
            $table->string('email'); // Kolom untuk email
            $table->string('no_whatsapp'); // Kolom untuk nomor WhatsApp
            $table->string('lampiran')->nullable(); // Kolom untuk lampiran (nullable)
            $table->date('tanggal_pelaksana'); // Kolom untuk tanggal pelaksana
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_layanan');
    }
};
