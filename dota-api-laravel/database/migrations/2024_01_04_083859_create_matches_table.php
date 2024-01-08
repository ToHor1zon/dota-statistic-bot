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
        Schema::create('matches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->boolean('did_radiant_win');
            $table->dateTime('start_date_time');
            $table->integer('duration');
            $table->integer('lobby_type_id');
            $table->integer('game_mode_type_id');
            $table->integer('rank');
            $table->integer('radiant_kills_count');
            $table->integer('dire_kills_count');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
