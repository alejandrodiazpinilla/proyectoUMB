<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monthly_report_images', function (Blueprint $table) {
            $table->unsignedBigInteger('monthly_report_id');
            $table->text('image')->collation('utf8_spanish_ci');
            $table->integer('state')->default(0);
            $table->integer('order');

            $table->foreign('monthly_report_id')->references('id')->on('monthly_report')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_report_images');
    }
};