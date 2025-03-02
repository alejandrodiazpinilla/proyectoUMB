<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staff_request_notifications', function (Blueprint $table) {
            $table->id();
            $table->text('type')->collation('utf8_spanish_ci');
            $table->string('read')->collation('utf8_spanish_ci')->default('no');
            $table->unsignedBigInteger('staff_request_id')->nullable();
            $table->text('obs')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('staff_request_id')->references('id')->on('staff_request')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_request_notifications');
    }
};
