<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_rel_id')->nullable()->comment('usuario asociado al empleado');
            $table->unsignedBigInteger('document_type_id');
            $table->string('identification');
            $table->date('expedition_date');
            $table->unsignedBigInteger('expedition_city_id');
            $table->string('name')->collation('utf8_spanish_ci');
            $table->string('surname')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('company_id');
            $table->string('email')->collation('utf8_spanish_ci');
            $table->string('telephone');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('blood_type_id');
            $table->string('gender');
            $table->unsignedBigInteger('marital_status_id');
            $table->string('address')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('home_city_id');
            $table->unsignedBigInteger('locality_id');
            $table->unsignedBigInteger('neighborhood_id');
            $table->integer('state')->default(1);
            $table->unsignedBigInteger('user_id')->comment('usuario modificador');
            $table->timestamps();

            $table->foreign('user_rel_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_type_id')->references('id')->on('document_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('expedition_city_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('blood_type_id')->references('id')->on('blood_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('marital_status_id')->references('id')->on('marital_status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('home_city_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
