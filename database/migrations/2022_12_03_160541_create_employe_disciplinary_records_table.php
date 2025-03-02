<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees_disciplinary_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('disciplinary_record_id');
            $table->text('file')->collation('utf8_spanish_ci');
            $table->text('description')->collation('utf8_spanish_ci');
            $table->integer('state')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('disciplinary_record_id')->references('id')->on('types_disciplinary_records')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('employees_disciplinary_records');
    }
};
