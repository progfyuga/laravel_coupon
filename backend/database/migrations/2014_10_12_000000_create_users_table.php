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
            $table->string('name',255);
            $table->string('content',255);
            $table->integer('prefecture_id');
            $table->string('address',255);
            $table->string('email',255);
            $table->string('tel_no',255);
            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();
            $table->boolean('map_status')->default(false);
            $table->string('password',255);
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
