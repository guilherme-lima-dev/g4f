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
        Schema::create('series_tv_intervals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_tv_id');
            $table->integer('day_week');
            $table->time('time');
            $table->timestamps();
            $table->foreign('series_tv_id')->references('id')->on('series_tv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_tv_intervals');
    }
};
