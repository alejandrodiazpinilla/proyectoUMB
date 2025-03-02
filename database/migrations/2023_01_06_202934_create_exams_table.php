<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->date('date');
            $table->string('type')->collation('utf8_spanish_ci');
            $table->enum("concept", ["Apto", "No Apto"])->nullable();
            $table->text('file')->collation('utf8_spanish_ci');
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('employees_contracts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
