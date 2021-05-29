<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->integer('home_result')->nullable();
            $table->integer('away_result')->nullable();
            $table->string('sign')->nullable();
            $table->string('home_score')->nullable();
            $table->string('away_score')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->string('created_at');
            $table->string('updated_at');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
