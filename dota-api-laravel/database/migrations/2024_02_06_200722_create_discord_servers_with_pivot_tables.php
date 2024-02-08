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
        Schema::create('discord_servers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('channel_Id');
        });

        Schema::create('discord_servers_users', function (Blueprint $table) {
            $table->id();
            $table->string('discord_server_id');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discord_servers');
        Schema::dropIfExists('discord_servers_users');
    }
};
