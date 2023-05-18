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
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->index('id');

            $table->unsignedBigInteger('user_one');
            $table->foreign('user_one')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_two');
            $table->foreign('user_two')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
