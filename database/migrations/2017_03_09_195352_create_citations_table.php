<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('citation');
            $table->string('link');
            $table->string('identifier');
            $table->timestamps();
        });

        Schema::create('vernacular_name', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taxonomy_id')->unsigned();
            $table->integer('citation_id')->unsigned();
            $table->string('name');
            $table->char('languaje', 2);
            $table->boolean('preferred');
            $table->boolean('sex');
            $table->string('life_stage');
            $table->string('area');
            $table->char('country', 2);
            $table->boolean('plural');
            $table->timestamps();
            $table->foreign('taxonomy_id')->references('id')->on('taxonomic_classifications')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('citation_id')->references('id')->on('citations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citations');
        Schema::dropIfExists('vernacular_name');
    }
}
