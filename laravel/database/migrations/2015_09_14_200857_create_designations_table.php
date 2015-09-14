<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation');
            $table->timestamps();
        });

        Schema::create('users_designations', function (Blueprint $table) {
            $table->integer('users_id')->unsigned()->index();

            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('designations_id')->unsigned()->index();

            $table->foreign('designations_id')
                ->references('id')
                ->on('designations')
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
        Schema::drop('designations');
        Schema::drop('users_designations');
    }
}
