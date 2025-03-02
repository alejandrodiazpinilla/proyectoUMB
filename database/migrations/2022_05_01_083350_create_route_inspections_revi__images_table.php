<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('route_inspections_revi__images', function (Blueprint $table) {
            $table->unsignedBigInteger('route_inspections_id');
            $table->string('image');
            $table->foreign('route_inspections_id')->references('id')->on('route_inspections')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('route_inspections_revi__images');
    }
};
