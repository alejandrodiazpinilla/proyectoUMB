<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->collation('utf8_spanish_ci');
            $table->string('nit');
            $table->string('direccion')->collation('utf8_spanish_ci');
            $table->string('telefono');
            $table->string('celular');
            $table->unsignedBigInteger('ciudad_id');
            $table->text('sobre_nosotros')->collation('utf8_spanish_ci');
            $table->text('mision')->collation('utf8_spanish_ci');
            $table->text('vision')->collation('utf8_spanish_ci');
            $table->text('video_institucional')->collation('utf8_spanish_ci');
            $table->text('ubicacion_maps')->collation('utf8_spanish_ci');
            $table->text('facebook')->collation('utf8_spanish_ci');
            $table->text('instagram')->collation('utf8_spanish_ci');
            $table->text('linkedin')->collation('utf8_spanish_ci');
            $table->text('observaciones')->nullable()->collation('utf8_spanish_ci');
            $table->string('logo')->collation('utf8_spanish_ci');
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
