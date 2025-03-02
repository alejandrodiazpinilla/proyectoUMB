<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monthly_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('month_year')->collation('utf8_spanish_ci');
            $table->date('audit_date')->comment('Fecha de presentación del informe de auditoría');
            $table->text('reason_report')->collation('utf8_spanish_ci')->nullable('objeto del informe');
            $table->text('report_scope')->collation('utf8_spanish_ci')->nullable()->comment('alcance del reporte');
            $table->text('developed_activities')->collation('utf8_spanish_ci')->nullable()->comment('documentos, procesos y actividades desarrolladas');
            $table->text('weaknesses')->collation('utf8_spanish_ci')->nullable()->comment('debilidades');
            $table->text('strengths')->collation('utf8_spanish_ci')->nullable()->comment('fortalezas');
            $table->text('indicator')->collation('utf8_spanish_ci')->nullable()->comment('indicador');
            $table->integer('check_indicator')->default(1);
            $table->text('conclusions')->collation('utf8_spanish_ci')->nullable()->comment('conclusiones');
            $table->integer('state')->default(0)->comment('0:Pendiente Por Aprobar;1:Aprobado Por Subgerencia;2:Aprobado Por Gerencia');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_report');
    }
};