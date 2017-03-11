<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageMetadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_metadatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->unsigned();
            $table->integer('resolution_units');
            $table->integer('width');
            $table->integer('heigth');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('device_name');
            $table->date('date');
            $table->integer('size');
            $table->string('compress_scheme');
            $table->boolean('is_color');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('image_metadatas', function (Blueprint $table) {
            $table->dropForeign('image_metadatas_image_id_foreign');
        });
        Schema::dropIfExists('image_metadatas');
    }
}
