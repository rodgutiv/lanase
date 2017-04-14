<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('citation_id')->unsigned();
            $table->boolean('marine')->nullable();
            $table->boolean('terrestrial')->nullable();
            $table->boolean('extinct')->nullable();
            $table->boolean('hybrid')->nullable();
            $table->string('living_period')->nullable();
            $table->integer('age_in_days')->nullable();
            $table->decimal('size_in_mm')->nullable();
            $table->decimal('mass_in_gram')->nullable();
            $table->string('name_2')->nullable();
            $table->string('habitat')->nullable();
            $table->boolean('freshwater')->nullable();
            $table->string('name');
            $table->foreign('citation_id')->references('id')->on('citations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('species', function (Blueprint $table) {
            $table->dropForeign('species_citation_id_foreign');
        });
        Schema::dropIfExists('species');
    }
}
