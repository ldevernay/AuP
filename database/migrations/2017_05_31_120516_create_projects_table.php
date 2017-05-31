<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
  public function up()
  {
    Schema::create('projects', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('name', 80);
    $table->text('pitch');
    $table->string('github', 80);
    $table->integer('creator_id')->unsigned();
    $table->foreign('creator_id')
        ->references('id')
        ->on('users')
        ->onDelete('restrict')
        ->onUpdate('restrict');
  });
}

public function down()
{
  Schema::drop('projects');
}
}
