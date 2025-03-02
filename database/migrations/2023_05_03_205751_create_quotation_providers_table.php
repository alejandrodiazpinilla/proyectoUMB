<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotation_providers', function (Blueprint $table) {
            $table->unsignedBigInteger('quotation_id');
            $table->text('product')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('provider_id_1')->nullable();
            $table->unsignedBigInteger('cost_1')->nullable();
            $table->unsignedBigInteger('payment_condition_id_1')->nullable();
            $table->unsignedBigInteger('provider_id_2')->nullable();
            $table->unsignedBigInteger('cost_2')->nullable();
            $table->unsignedBigInteger('payment_condition_id_2')->nullable();
            $table->unsignedBigInteger('provider_id_3')->nullable();
            $table->unsignedBigInteger('cost_3')->nullable();
            $table->unsignedBigInteger('payment_condition_id_3')->nullable();

            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provider_id_1')->references('id')->on('providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_condition_id_1')->references('id')->on('payment_conditions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provider_id_2')->references('id')->on('providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_condition_id_2')->references('id')->on('payment_conditions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provider_id_3')->references('id')->on('providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_condition_id_3')->references('id')->on('payment_conditions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotation_providers');
    }
};
