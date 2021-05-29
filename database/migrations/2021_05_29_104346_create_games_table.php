<?php

use Database\Seeders\GameSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

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
            
            $table->string('home_team')->nullable();
            $table->string('away_team')->nullable();
            $table->string('game_date');
            $table->integer('home_result')->nullable();
            $table->integer('away_result')->nullable();
            $table->string('sign')->nullable();
            $table->string('home_score')->nullable();
            $table->string('away_score')->nullable();
            $table->boolean('final')->default(false);
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => GameSeeder::class,
        ]);
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
