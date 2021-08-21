<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_lastname',255);
            $table->string('student_firstname',255);
            $table->string('student_lastname_kana',255);
            $table->string('student_firstname_kana',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('tel_no',255);
            $table->string('parent_lastname',255);
            $table->string('parent_firstname',255);
            $table->string('parent_lastname_kana',255);
            $table->string('parent_firstname_kana',255);
            $table->string('password', 255);            
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
