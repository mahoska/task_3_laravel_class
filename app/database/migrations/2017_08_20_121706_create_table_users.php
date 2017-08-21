<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('email', 100)->unique();
                    $table->string('name')->unique();
                    $table->string('password',60);
                    //token for the user's ability to remember
                    $table->remembeToken();
                    //$table->string('remember_token', 100)->nullable()->index();//variant 2
                     // created_at, updated_at
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
		Schema::drop('users');
	}

}
