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
        Schema::create('work_minutes', function (Blueprint $table) {

            /* Esquema de la Tabla */
            $table->id();
            $table->integer('consecutive')->nullable()->comment('Consecutivo Acta (Puede Ser Diferente al ID de la Tabla)');
            $table->date('date')->nullable()->comment('Fecha Ejecución Acta');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('company_id');
            $table->string('topic')->nullable()->comment('Tema Principal Acta');
            $table->string('place')->nullable()->comment('Lugar de la Reunión');
            $table->unsignedBigInteger('leader_id')->comment('Id del Lider de la Reunion');
            $table->string('start')->nullable()->comment('Hora de Inicio');
            $table->string('end')->nullable()->comment('Hora de Cierre');
            $table->text('description')->collation('utf8_spanish_ci')->nullable()->comment('Desarrollo de la Reunion');
            $table->unsignedBigInteger('user_id')->comment('Creador del Acta');
            $table->timestamps();

            /* Relaciones Foraneas */
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('leader_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('work_minutes');
    }
};
