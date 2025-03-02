<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->text('name')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('nit');
            $table->unsignedBigInteger('telephone');
            $table->text('address')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('academies');
    }
};
