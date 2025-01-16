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
        Schema::create('last_edus', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('semester')->nullable();
            $table->double('gpa')->nullable();
            $table->string('transcript_file')->nullable();
            $table->foreign('nik')->references('nik')->on('identities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_edus');
    }
};
