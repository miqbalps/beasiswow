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
        Schema::create('families', function (Blueprint $table) {
            $table->foreignId('nik')->constrained('identities')->cascadeOnDelete();
            $table->id(); // Primary key (auto-increment integer)
            $table->enum('type', ['father', 'mother', 'guardian']); // Jenis orang tua (ibu, ayah, wali)
            $table->string('status'); // Status (contoh: hidup/meninggal, aktif/tidak aktif, dll.)
            $table->string('full_name'); // Nama lengkap
            $table->string('last_education'); // Pendidikan terakhir
            $table->string('job'); // Pekerjaan
            $table->string('position'); // Posisi
            $table->integer('income'); // Penghasilan
            $table->string('phone'); // Nomor telepon
            $table->text('address'); // Alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
