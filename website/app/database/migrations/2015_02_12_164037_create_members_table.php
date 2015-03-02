<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function($table)
		{
			// photo ??
			$table->increments('id');
			$table->string('firstName', 255);
			$table->string('lastName', 255);
			$table->integer('memberSince');
			$table->boolean('onlySupporting')->default(False);
			$table->boolean('isWebsiteAdmin')->default(False);
			$table->text('welcomeText')->nullable();
			$table->text('description')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('role', 255)->nullable();
			$table->string('telephoneNumber', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('facebookLink', 255)->nullable();
			$table->string('job', 255)->nullable();
			$table->string('employer', 255)->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('members');
	}

}
