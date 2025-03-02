<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('route_inspections', function (Blueprint $table) {
            $table->id();
            $table->string('initial_image')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->text('visitors')->collation('utf8_spanish_ci')->nullable();
            $table->text('correspondence')->collation('utf8_spanish_ci')->nullable();
            $table->text('workplace')->collation('utf8_spanish_ci')->nullable();
            $table->text('parking')->collation('utf8_spanish_ci')->nullable();
            $table->string('topic_revi')->collation('utf8_spanish_ci')->nullable();
            $table->text('description_revi')->collation('utf8_spanish_ci')->nullable();
            $table->string('file_revi')->collation('utf8_spanish_ci')->nullable();
            $table->string('end_image')->collation('utf8_spanish_ci')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('route_inspections');
    }
};
