<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
  public function up()
  {
    Schema::create('languages', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('name', 80);
  });
}

public function down()
{
  Schema::drop('languages');
}
}
