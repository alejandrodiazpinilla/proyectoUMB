<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empresas_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('empresa_id');
            $table->string('nombre')->collation('utf8_spanish_ci')->unique();
            $table->string('imagen')->collation('utf8_spanish_ci');
            $table->text('descripcion')->collation('utf8_spanish_ci');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas_servicios');
    }
};
