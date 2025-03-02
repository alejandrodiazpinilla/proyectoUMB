<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->Integer('nro_participants');
            $table->unsignedBigInteger('entity_id');
            $table->string('type')->collation('utf8_spanish_ci');
            $table->string('link_address')->collation('utf8_spanish_ci');
            $table->string('topic')->collation('utf8_spanish_ci');
            $table->text('description')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('entity_id')->references('id')->on('training_entities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
