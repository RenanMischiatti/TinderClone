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
        Schema::create('regra_like', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_like');
            $table->foreign('user_like')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_liked');
            $table->foreign('user_liked')->references('id')->on('users')->onDelete('cascade');
            
            $table->boolean('liked_or_not');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
