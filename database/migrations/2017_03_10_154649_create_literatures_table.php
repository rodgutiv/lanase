<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiteraturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literatures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('citation_id')->unsigned();
            $table->string('type');
            $table->string('remarks');
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
        Schema::table('literatures', function (Blueprint $table) {
            $table->dropForeign('literatures_citation_id_foreign');
        });
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('literatures');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
