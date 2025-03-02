<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users_sons', function (Blueprint $table) {
            $table->string('son_name')->collation('utf8_spanish_ci');
            $table->date('birthdate');
            $table->unsignedBigInteger('user_id');
            $table->string('gender')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('city_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_sons');
    }
};
