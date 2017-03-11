<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('datasetkey');
            $table->integer('count_usages');
            $table->integer('count_synonyms');
            $table->integer('count_names');
            $table->integer('count_col');
            $table->integer('count_nub');
            $table->string('count_by_rank');
            $table->string('count_by_kingdom');
            $table->string('count_by_origin');
            $table->string('count_vernacular_by_lang');
            $table->string('count_extensions');
            $table->string('count_other');
            $table->timestamp('downloaded')->nullable();
            $table->timestamp('created')->nullable();
            $table->boolean('latest');
            $table->string('count_by_issue');
            $table->string('count_by_constituent');
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
        Schema::dropIfExists('metrics');
    }
}
