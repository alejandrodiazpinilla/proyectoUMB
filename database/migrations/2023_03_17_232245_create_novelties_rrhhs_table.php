<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('novelties_rrhh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('customer_id')->default(null);
            $table->text('description')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('novelty_type_id');
            $table->date('payment_date')->default(null);
            $table->text('penalty')->collation('utf8_spanish_ci')->comment('descripción de la sanción')->default(null);
            $table->integer('state')->default(0)->comment('0: Pago Pendiente; 1: Pago Recibido');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('novelty_type_id')->references('id')->on('novelties_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('novelties_rrhh');
    }
};
