<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('novelties_types', function (Blueprint $table) {
            $table->id();
            $table->text('name')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('delegate_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('delegate_id')->references('id')->on('delegate_novelties')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('novelties_types');
    }
};
