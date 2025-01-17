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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->enum('type', ['individual', 'group']);
            $table->enum('level', ['international', 'national', 'regional', 'local']);
            $table->enum('rank', ['1', '2', '3', 'honorable-mention']);
            $table->string('year');
            $table->string('proof_file');
            $table->foreign('nik')->references('nik')->on('identities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
