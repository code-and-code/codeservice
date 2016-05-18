<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); //jà é primary key
            $table->string('name');
            $table->boolean('active')->nullable()->default();
            $table->boolean('show')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('categories');
    }
}
