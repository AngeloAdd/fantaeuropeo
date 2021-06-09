<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->boolean('first_time_login')->default(false);
            $table->boolean('admin')->default(false);
            $table->boolean('games_mod')->default(false);
            $table->boolean('users_mod')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => UserSeeder::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
