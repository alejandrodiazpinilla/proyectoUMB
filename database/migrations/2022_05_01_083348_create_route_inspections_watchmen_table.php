<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('route_inspections_watchmen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_inspections_id');
            $table->unsignedBigInteger('watchman_id');
            $table->text('identity_card');
            $table->text('cockade');
            $table->text('cap');
            $table->text('personal_presentation')->nullable();
            $table->foreign('route_inspections_id')->references('id')->on('route_inspections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('watchman_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('route_inspections_watchmen');
    }
};
