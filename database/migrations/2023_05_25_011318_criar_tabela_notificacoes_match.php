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
        Schema::create('match_notification', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->references('id')->on('match')->onDelete('cascade');

            $table->unsignedBigInteger('mensagem_id')->nullable();
            $table->foreign('mensagem_id')->references('id')->on('mensagens_match')->onDelete('cascade');

            $table->unsignedBigInteger('user_alerted');
            $table->foreign('user_alerted')->references('id')->on('users')->onDelete('cascade');
            
            $table->boolean('visualized')->default(false);

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
