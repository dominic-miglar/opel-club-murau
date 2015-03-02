<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoForeignTableAlbums extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function($table) {
            $table->integer('title_photo_id')->unsigned()->nullable();
            $table->foreign('title_photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function($table) {
            $table->dropForeign('albums_title_photo_id_foreign');
            $table->dropColumn('title_photo_id');
        });
    }

}
