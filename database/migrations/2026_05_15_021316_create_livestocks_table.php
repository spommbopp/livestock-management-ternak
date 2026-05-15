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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');      // Menambahkan kolom nama hewan
            $table->string('type');      // Menambahkan kolom jenis (Sapi/Kambing/dll)
            $table->integer('weight');    // Menambahkan kolom berat badan (angka)
            $table->text('notes')->nullable(); // Menambahkan kolom catatan (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
