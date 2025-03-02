<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('staff_request_id');
            $table->unsignedBigInteger('contract_type_id');
            $table->string('position')->collation('utf8_spanish_ci');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule')->collation('utf8_spanish_ci');
            $table->string('file')->collation('utf8_spanish_ci');
            $table->string('attached')->collation('utf8_spanish_ci');
            $table->integer('state')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('staff_request_id')->references('id')->on('staff_request')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_contracts');
    }
};
