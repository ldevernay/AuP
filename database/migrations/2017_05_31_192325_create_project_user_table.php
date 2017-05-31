<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration
{
  public function up()
  {
  Schema::create('project_user', function(Blueprint $table) {
    $table->increments('id');
    $table->integer('project_id')->unsigned();
    $table->integer('user_id')->unsigned();
    $table->foreign('project_id')->references('id')->on('projects')
          ->onDelete('restrict')
          ->onUpdate('restrict');

    $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('restrict')
          ->onUpdate('restrict');
  });
}

public function down()
{
  Schema::table('project_user', function(Blueprint $table) {
    $table->dropForeign('project_user_project_id_foreign');
    $table->dropForeign('project_user_user_id_foreign');
  });

  Schema::drop('project_user');
}
}
