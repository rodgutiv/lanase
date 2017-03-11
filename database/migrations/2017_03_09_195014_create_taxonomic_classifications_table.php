<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomicClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomic_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scientific_name');
            $table->string('canonic_name');
            $table->string('infra_generic');
            $table->string('infra_epiteto_specific');
            $table->string('rank_marker');
            $table->timestamp('modified')->nullable();
            $table->integer('specific_epithet');
            $table->string('superkingdom');
            $table->string('kingdom');
            $table->string('phylum');
            $table->string('subphylum');
            $table->string('superclass');
            $table->string('class');
            $table->string('subclass');
            $table->string('infraclass');
            $table->string('superorder');
            $table->string('order_2');
            $table->string('suborder');
            $table->string('infraorder');
            $table->string('parvorder');
            $table->string('superfamily');
            $table->string('family');
            $table->string('subfamily');
            $table->string('tribe');
            $table->string('genus');
            $table->string('subgenus');
            $table->string('subspecie');
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
        Schema::dropIfExists('taxonomic_classifications');
    }
}
