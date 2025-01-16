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
            $table->id(); // Primary key (auto-increment integer)
            $table->string('nik'); // Nomor Induk Kependudukan
            $table->enum('type', ['father', 'mother', 'guardian'])->nullable(); // Jenis orang tua (ibu, ayah, wali)
            $table->string('status')->nullable(); // Status (contoh: hidup/meninggal, aktif/tidak aktif, dll.)
            $table->string('full_name')->nullable(); // Nama lengkap
            $table->string('last_education')->nullable(); // Pendidikan terakhir
            $table->string('job')->nullable(); // Pekerjaan
            $table->string('position')->nullable(); // Posisi
            $table->integer('income')->nullable(); // Penghasilan
            $table->string('phone')->nullable(); // Nomor telepon
            $table->text('address')->nullable(); // Alamat
            $table->foreign('nik')->references('nik')->on('identities')->onDelete('cascade');
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
