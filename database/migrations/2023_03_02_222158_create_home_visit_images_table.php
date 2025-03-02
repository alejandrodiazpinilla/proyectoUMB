<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_visit_images', function (Blueprint $table) {
            $table->unsignedBigInteger('home_visit_id');
            $table->text('image')->collation('utf8_spanish_ci');
            $table->integer('state')->default(0);
            $table->integer('order');

            $table->foreign('home_visit_id')->references('id')->on('home_visits')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_visit_images');
    }
};
