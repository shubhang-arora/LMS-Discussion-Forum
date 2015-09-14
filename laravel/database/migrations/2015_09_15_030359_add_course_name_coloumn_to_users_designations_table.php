<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseNameColoumnToUsersDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_designations', function (Blueprint $table) {
            $table->integer('course_id');

            $table->foreign('course_id')
                ->refrence('id')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_designations', function (Blueprint $table) {
            $table->dropColumn('course_id');
        });
    }
}
