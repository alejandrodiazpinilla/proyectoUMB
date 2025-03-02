<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_spanish_ci');
            $table->string('nit')->collation('utf8_spanish_ci');
            $table->string('telephone')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('city_id');
            $table->text('address')->collation('utf8_spanish_ci');
            $table->string('email')->collation('utf8_spanish_ci');
            $table->string('contact_name')->collation('utf8_spanish_ci');
            $table->string('contact_telephone')->collation('utf8_spanish_ci');
            $table->string('contact_email')->collation('utf8_spanish_ci');
            $table->string('economic_activity')->collation('utf8_spanish_ci');
            $table->string('rut')->collation('utf8_spanish_ci');
            $table->string('chamber_commerce')->collation('utf8_spanish_ci');
            $table->string('bank_certification')->collation('utf8_spanish_ci');
            $table->string('opening_hours')->collation('utf8_spanish_ci')->nullable();
            $table->string('webpage')->collation('utf8_spanish_ci')->nullable();
            $table->unsignedBigInteger('payment_condition_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('state')->default(1);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_condition_id')->references('id')->on('payment_conditions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('providers');
    }
};
