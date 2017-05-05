<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('dataset_user', function (Blueprint $table) {
            $table->text('order');
            $table->integer('user_id')->unsigned();
            $table->integer('dataset_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dataset_id')->references('id')->on('datasets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('specimens', function (Blueprint $table) {
            $table->dropForeign('datasets_project_id_foreign');
        });
        Schema::dropIfExists('dataset_user');
        Schema::dropIfExists('datasets');
    }
}
