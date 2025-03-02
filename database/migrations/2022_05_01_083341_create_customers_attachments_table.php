<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_spanish_ci');
            $table->date('date_send')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('year')->nullable();
            $table->enum('type', ['Propuesta Económica', 'Licitación', 'Análisis de Riesgos', 'Contrato Comercial'])->nullable();
            $table->date('contract_init_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers_attachments');
    }
};
