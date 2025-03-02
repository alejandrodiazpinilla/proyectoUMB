<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('novelties_watchmen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('novelty_type_id');
            $table->unsignedBigInteger('incoming_name_id')->nullable();
            $table->unsignedBigInteger('outgoing_name_id')->nullable();
            $table->text('type')->collation('utf8_spanish_ci')->nullable()->comment('Diurno/Nocturno');
            $table->text('novelty_type_name')->collation('utf8_spanish_ci')->nullable();
            $table->text('image')->collation('utf8_spanish_ci')->nullable();
            $table->text('name_involved')->collation('utf8_spanish_ci')->nullable();
            $table->text('data_involved')->collation('utf8_spanish_ci')->nullable();
            $table->text('description')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->text('observation')->collation('utf8_spanish_ci')->nullable();
            $table->unsignedBigInteger('managed_by')->nullable();
            $table->integer('state')->default(0);
            $table->timestamps();
            $table->foreign('novelty_type_id')->references('id')->on('novelties_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('incoming_name_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('outgoing_name_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('novelties_watchmen');
    }
};
