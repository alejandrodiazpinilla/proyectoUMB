<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('apodatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('employe_id');
            $table->integer('course_code');
            $table->date('course_date');
            $table->string('number')->collation('utf8_spanish_ci')->comment('nro del curso');
            $table->text('file')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('academy_id');
            $table->integer('state')->default(1)->comment('1:Acreditado, 2:Por Acreditar, 3:Por Vencer');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('academy_id')->references('id')->on('academies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('apodatos');
    }
};
