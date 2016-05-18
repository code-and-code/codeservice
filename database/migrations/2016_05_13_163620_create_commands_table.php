<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsTable extends Migration
{

    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('command');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('commands');
    }
}
