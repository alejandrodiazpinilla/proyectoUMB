<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technical_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visit_type_id');
            $table->text('description')->collation('utf8_spanish_ci');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->text('observation')->collation('utf8_spanish_ci')->nullable();
            $table->date('new_date')->nullable();
            $table->unsignedBigInteger('managed_by')->nullable();
            $table->integer('state')->default(1);
            $table->timestamps();
            $table->foreign('visit_type_id')->references('id')->on('visit_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('managed_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('technical_visits');
    }
};