<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->text('name')->collation('utf8_spanish_ci');
            $table->text('position')->collation('utf8_spanish_ci');
            $table->text('telephone')->collation('utf8_spanish_ci');
            $table->text('relationship')->collation('utf8_spanish_ci');
            $table->integer('state')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_references');
    }
};
