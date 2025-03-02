<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_minutes_commitments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_minutes_id')->comment('Relacion con Acta de Obra');
            $table->text('commitment')->collation('utf8_spanish_ci')->nullable()->comment('Compromiso');
            $table->text('responsible')->collation('utf8_spanish_ci')->comment('Responsable del Compromiso');
            $table->date('date_start')->comment('Fecha Compromiso');
            $table->date('date_end')->comment('Fecha Cierre');
            $table->unsignedBigInteger('user_id')->comment('Creador del Compromiso');
            $table->timestamps();

            $table->foreign('work_minutes_id')->references('id')->on('work_minutes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_minutes_commitments');
    }
};
