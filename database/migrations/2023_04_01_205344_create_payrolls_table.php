<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('identification');
            $table->string('basic_salary')->collation('utf8_spanish_ci');
            $table->integer('worked_days');
            $table->integer('days_disability');
            $table->unsignedBigInteger('salary');
            $table->unsignedBigInteger('transport_assistance');
            $table->unsignedBigInteger('commissions');
            $table->unsignedBigInteger('bonus');
            $table->unsignedBigInteger('discounts');
            $table->unsignedBigInteger('course');
            $table->unsignedBigInteger('health');
            $table->unsignedBigInteger('pension');
            $table->unsignedBigInteger('inhability')->comment('Valor Incapacidad');
            $table->unsignedBigInteger('total_accrued');
            $table->unsignedBigInteger('total_discounts');
            $table->unsignedBigInteger('amount_be_pay');
            $table->integer('month');
            $table->integer('year');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
           
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
};
