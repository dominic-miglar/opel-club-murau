<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table)
		{
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('description', 255)->nullable();;
			$table->string('path', 255)->nullable();
			$table->string('thumbPath', 255)->nullable();
			$table->integer('album_id')->unsigned()->nullable();
			$table->foreign('album_id')->references('id')->on('albums');
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
		Schema::drop('photos');
	}

}
