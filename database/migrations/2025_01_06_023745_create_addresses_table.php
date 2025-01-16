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
            $table->enum('type', ['ktp_domicile', 'current_domicile']);// Foreign key ke tabel people
            $table->string('street');
            $table->string('rt');
            $table->string('rw');
            $table->string('postal_code');
            $table->string('village');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
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
