<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('address');
            $table->integer('contact');
            $table->string('status')->default('Còn Trống');
            $table->string('image_path');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_district')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_district')->references('id')->on('districts');
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
        Schema::dropIfExists('articles');
    }
}
