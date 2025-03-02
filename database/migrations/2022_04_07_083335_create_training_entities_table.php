<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_entities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id');
            $table->integer('state')->default(1);
            $table->timestamps();
           
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_entities');
    }
};