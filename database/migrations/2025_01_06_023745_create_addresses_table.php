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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nik'); // Alamat
            $table->enum('type', ['ktp_domicile', 'current_domicile'])->nullable();// Foreign key ke tabel people
            $table->string('street')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->foreign('nik')->references('nik')->on('identities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
