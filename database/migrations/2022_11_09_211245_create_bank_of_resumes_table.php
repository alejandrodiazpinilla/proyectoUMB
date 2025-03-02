<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_of_resumes', function (Blueprint $table) {
            $table->id();
            $table->string('identification', 11);
            $table->string('name', 80)->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('company_id');
            $table->string('email', 50)->collation('utf8_spanish_ci');
            $table->string('telephone', 10)->collation('utf8_spanish_ci');
            $table->text('file')->nullable()->collation('utf8_spanish_ci');
            $table->date('date_of_birth');
            $table->string('gender', 1)->comment('F ; M')->collation('utf8_spanish_ci');
            $table->string('address', 100)->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('locality_id');
            $table->unsignedBigInteger('neighborhood_id');
            $table->integer('state')->default(0)->comment('0:Disponible , 1:Actualmente Contratado');
            $table->text('description')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id')->comment('usuario modificador');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_of_resumes');
    }
};
