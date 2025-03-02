<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracing_termination', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('termination_id');
            $table->unsignedBigInteger('user_id');
            $table->text('description')->collation('utf8_spanish_ci')->nullable();
            $table->unsignedBigInteger('state_id')->default(15)->comment('15:Pendiente Por Aprobar');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('state_terminations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('termination_id')->references('id')->on('termination_staff')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracing_termination');
    }
};