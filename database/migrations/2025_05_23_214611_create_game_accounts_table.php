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
        Schema::create('game_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username', 64);
            $table->string('phone_number', 16);
            $table->string('link', 64);
            $table->dateTime('link_expires_at');
            $table->boolean('active');
            $table->timestamps();

            $table->index(['username']);
            $table->index(['link']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_accounts');
    }
};
