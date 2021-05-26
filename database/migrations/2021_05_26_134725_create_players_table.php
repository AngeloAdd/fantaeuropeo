<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\PlayerSeeder;
use Illuminate\Support\Facades\Artisan;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            
            $table->string('last');
            $table->string('first');
            $table->string('role');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');

            $table->timestamps();

        });
        Artisan::call('db:seed', [
            '--class' => PlayerSeeder::class,
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
