<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('approved_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('provider_id')->comment('Proveedor seleccionado por gerencia o subgerencia')->nullable();
            $table->integer('state')->default(0)->comment('0:En Gestión , 1:Aprobada , 2:Rechazada');
            $table->string('purchase_order')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('invoice_number')->nullable();
            $table->text('attachments')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
