<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_visit_relatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_visit_id');
            $table->text('name')->collation('utf8_spanish_ci');
            $table->text('surname')->collation('utf8_spanish_ci');
            $table->text('relationship')->collation('utf8_spanish_ci');
            $table->text('which_relative')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('education_level_id');
            $table->text('employment_situation')->collation('utf8_spanish_ci');
            $table->timestamps();

            $table->foreign('home_visit_id')->references('id')->on('home_visits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_visit_relatives');
    }
};