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
            $table->string('name');
            $table->string('nkk');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('married');
            $table->string('religion');
            $table->string('phone');
            $table->integer('child_number');
            $table->integer('origin');
            $table->integer('income');
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
