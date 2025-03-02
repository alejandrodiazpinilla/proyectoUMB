<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_minutes_attendees', function (Blueprint $table) {

            /* Esquema de la Tabla */
            $table->id();
            $table->unsignedBigInteger('work_minutes_id')->comment('Relacion con Acta de Obra');
            $table->unsignedBigInteger('attendee_id')->comment('Asistente');
            $table->string('signature')->nullable();
            $table->unsignedBigInteger('user_id')->comment('Creador del Registro');
            $table->timestamps();

            /* Relaciones Foraneas */
            $table->foreign('work_minutes_id')->references('id')->on('work_minutes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('attendee_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_minutes_attendees');
    }
};
