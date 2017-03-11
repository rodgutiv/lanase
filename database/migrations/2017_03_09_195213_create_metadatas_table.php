<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creator');
            $table->string('title');
            $table->string('publisher');
            $table->string('publication_status_year');
            $table->string('subject');
            $table->string('contributor');
            $table->date('date');
            $table->string('language');
            $table->string('resource_type');
            $table->string('alternate_identifier');
            $table->string('related_identifier');
            $table->decimal('size');
            $table->string('format');
            $table->string('version');
            $table->string('rights');
            $table->string('description');
            $table->string('geolocation');
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
        Schema::dropIfExists('metadatas');
    }
}
