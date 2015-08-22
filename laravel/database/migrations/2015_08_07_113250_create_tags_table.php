<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('questions_tags', function (Blueprint $table) {
            $table->integer('questions_id')->unsigned()->index();

            $table->foreign('questions_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');

            $table->integer('tags_id')->unsigned()->index();

            $table->foreign('tags_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');

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
        Schema::drop('tags');
        Schema::drop('question_tag');
    }
}
