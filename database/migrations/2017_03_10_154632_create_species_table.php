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
            $table->boolean('marine');
            $table->boolean('terrestrial');
            $table->boolean('extinct');
            $table->boolean('hybrid');
            $table->string('living_period');
            $table->integer('age_in_days');
            $table->decimal('size_in_mm');
            $table->decimal('mass_in_gram');
            $table->string('name_2');
            $table->string('habitat');
            $table->boolean('freshwater');
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
