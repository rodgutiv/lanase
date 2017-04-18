<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_area_id')->unsigned();
            $table->string('title_es');
            $table->string('title');
            $table->string('abstract_es');
            $table->string('abstract')->nullable();
            $table->string('galleryfolder');
            $table->integer('display');
            $table->foreign('research_area_id')->references('id')->on('research_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('project_user', function (Blueprint $table) {
            $table->text('order_2');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('responsible');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_research_area_id_foreign');
        });
        // Schema::table('project_user', function (Blueprint $table) {
        //     $table->dropForeign('projects_user_user_id_foreign');
        //     $table->dropForeign('projects_user_project_id_foreign');
        // });
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('projects');
    }
}
