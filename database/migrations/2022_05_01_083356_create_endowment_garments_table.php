<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('endowment_garments', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_endowment_id');
            $table->unsignedBigInteger('garment_id')->comment('prenda');
            $table->integer('number_of')->default(1);
            $table->string('size')->collation('utf8_spanish_ci');
            $table->text('description')->collation('utf8_spanish_ci')->nullable();

            $table->foreign('delivery_endowment_id')->references('id')->on('delivery_endowment')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('garment_id')->references('id')->on('garments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('endowment_garments');
    }
};