<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comercial_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('read')->collation('utf8_spanish_ci')->default('no');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->text('obs')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('notification_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comercial_notifications');
    }
};
