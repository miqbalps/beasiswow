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
        Schema::create('identities', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nkk')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('married')->nullable();
            $table->string('religion')->nullable();
            $table->string('phone')->nullable();
            $table->integer('child_number')->nullable();
            $table->integer('origin')->nullable();
            $table->integer('income')->nullable();
            $table->string('pass_photo')->nullable();
            $table->string('ktp_photo')->nullable();
            $table->string('kk_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identities');
    }
};
