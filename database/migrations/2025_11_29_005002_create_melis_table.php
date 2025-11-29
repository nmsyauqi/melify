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
        Schema::create('melis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meli_uri_id')->constrained()->onDelete('cascade'); // Kunci asing
            $table->string('name'); // Nama meli (Quartz, Pyrite, dll.)
            $table->string('formula')->nullable(); // Rumus Kimia (SiO2)
            $table->string('color')->nullable(); // Warna
            $table->integer('mohs_hardness')->nullable(); // Kekerasan Mohs (skala 1-10)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('melis');
    }
};
