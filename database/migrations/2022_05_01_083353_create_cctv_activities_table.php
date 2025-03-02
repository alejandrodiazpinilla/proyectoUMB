<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cctv_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->text('previous_novelty')->collation('utf8_spanish_ci');
            $table->text('current_circuit')->collation('utf8_spanish_ci');
            $table->integer('number_cameras');
            $table->text('current_damage')->collation('utf8_spanish_ci');
            $table->string('quotation')->collation('utf8_spanish_ci')->nullable()->comment('cotizacion');
            $table->date('next_visit_date')->nullable();
            $table->text('description')->collation('utf8_spanish_ci');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cctv_activities');
    }
};