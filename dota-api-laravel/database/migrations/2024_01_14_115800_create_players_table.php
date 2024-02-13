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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('match_id');
            $table->integer('player_slot');
            $table->string('steam_account_id');
            $table->boolean('is_radiant');
            $table->boolean('is_victory');
            $table->integer('hero_id');
            $table->integer('kills');
            $table->integer('deaths');
            $table->integer('assists');
            $table->boolean('leaver_status')->nullable();
            $table->integer('num_last_hits');
            $table->integer('num_denies');
            $table->integer('gold_per_minute');
            $table->integer('networth');
            $table->integer('experience_per_minute');
            $table->integer('level');
            $table->integer('gold');
            $table->integer('gold_spent');
            $table->integer('hero_damage');
            $table->integer('tower_damage');
            $table->integer('hero_healing');
            $table->integer('party_id')->nullable();
            $table->boolean('is_random');
            $table->string('lane');
            $table->string('position');
            $table->string('streak_prediction')->nullable();
            $table->boolean('intentional_feeding');
            $table->string('role');
            $table->string('role_basic');
            $table->integer('imp');
            $table->string('award');
            $table->integer('item_0_id')->nullable();
            $table->integer('item_1_id')->nullable();
            $table->integer('item_2_id')->nullable();
            $table->integer('item_3_id')->nullable();
            $table->integer('item_4_id')->nullable();
            $table->integer('item_5_id')->nullable();
            $table->integer('backpack_0_id')->nullable();
            $table->integer('backpack_1_id')->nullable();
            $table->integer('backpack_2_id')->nullable();
            $table->integer('neutral_0_id')->nullable();
            $table->integer('behavior');
            $table->integer('invisible_seconds');
            $table->integer('dota_plus_hero_xp');
            $table->string('hero_short_name');
            $table->string('hero_display_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
