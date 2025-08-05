<?php
// File: database/migrations/xxxx_xx_xx_xxxxxx_create_media_table.php

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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // Path ke file gambar di storage
            $table->string('caption')->nullable(); // Caption atau deskripsi gambar
            $table->string('type'); // Tipe gambar: 'struktur', 'galeri', dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};