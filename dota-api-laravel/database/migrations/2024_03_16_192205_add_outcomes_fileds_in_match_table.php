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
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('bottom_lane_outcome');
            $table->integer('mid_lane_outcome');
            $table->integer('top_lane_outcome');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('bottom_lane_outcome');
            $table->dropColumn('mid_lane_outcome');
            $table->dropColumn('top_lane_outcome');
        });
    }
};
