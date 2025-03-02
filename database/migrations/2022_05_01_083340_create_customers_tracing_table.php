<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers_tracing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('send_brochure',2)->default('No');
            $table->string('email',100)->collation('utf8_spanish_ci')->nullable();
            $table->date('date_of_visit')->nullable();
            $table->text('obs')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers_tracing');
    }
};
