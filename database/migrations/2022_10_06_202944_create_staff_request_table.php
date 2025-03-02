<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staff_request', function (Blueprint $table) {
            $table->id();
            $table->date('induction_date');
            $table->string('job_title')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('customer_id');
            $table->integer('number_of_units');
            $table->string('programming')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('vacant_type_id');
            $table->unsignedBigInteger('contract_type_id');
            $table->string('salary_to_quote')->collation('utf8_spanish_ci');
            $table->string('salary_to_accrue')->collation('utf8_spanish_ci');
            $table->string('reasson')->collation('utf8_spanish_ci');
            $table->integer('units_male');
            $table->integer('units_female');
            $table->text('academic_degree')->collation('utf8_spanish_ci');
            $table->text('age_range')->collation('utf8_spanish_ci');
            $table->integer('experience')->comment('meses o años');
            $table->text('competencies')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('requesting_user_id');
            $table->unsignedBigInteger('rrhh_user_id');
            $table->unsignedBigInteger('company_id');
            $table->integer('state')->default(0)->comment('0:Por Gestionar ; 1: Finalizado');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vacant_type_id')->references('id')->on('vacant_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('requesting_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rrhh_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_request');
    }
};
