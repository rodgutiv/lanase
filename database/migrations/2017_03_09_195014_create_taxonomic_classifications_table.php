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
            $table->varchar('scientific_name');
            $table->varchar('canonic_name');
            $table->varchar('infra_generic');
            $table->varchar('infra_epiteto_specific');
            $table->varchar('rank_marker');
            $table->timestamps('modified');
            $table->integer('specific_epithet');
            $table->varchar('superkingdom');
            $table->varchar('kingdom');
            $table->varchar('phylum');
            $table->varchar('subphylum');
            $table->varchar('superclass');
            $table->varchar('class');
            $table->varchar('subclass');
            $table->varchar('infraclass');
            $table->varchar('superorder');
            $table->varchar('order_2');
            $table->varchar('suborder');
            $table->varchar('infraorder');
            $table->varchar('parvorder');
            $table->varchar('superfamily');
            $table->varchar('family');
            $table->varchar('subfamily');
            $table->varchar('tribe');
            $table->varchar('genus');
            $table->varchar('subgenus');
            $table->varchar('subspecie');
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
