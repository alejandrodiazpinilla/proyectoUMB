<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('novelties_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('novelty_type_id');
            $table->unsignedBigInteger('watchman_name_id')->nullable();
            $table->text('novelty_type_name')->collation('utf8_spanish_ci');
            $table->text('image')->collation('utf8_spanish_ci')->nullable();
            $table->text('description')->collation('utf8_spanish_ci');
            $table->string('action_type')->collation('utf8_spanish_ci')->default('Por Gestionar');
            $table->unsignedBigInteger('action_type_id')->nullable();
            $table->text('description_action')->collation('utf8_spanish_ci')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('novelty_type_id')->references('id')->on('novelties_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('watchman_name_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('action_type_id')->references('id')->on('actions_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('novelties_customers');
    }
};
