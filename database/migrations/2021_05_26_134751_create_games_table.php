<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $tabel->date('match_date_time');
            $table->integer('game_number');
            $table->integer('home_goals')->nullable()->default(null);
            $table->integer('away_goals')->nullable()->default(null);
            $table->string('result')->nullable()->default(null);
            $table->string('scores')->nullable()->default(null);
            $table->boolean('finale')->nullable()->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
