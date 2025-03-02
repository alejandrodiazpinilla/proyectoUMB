<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('name')->collation('utf8_spanish_ci');
            $table->text('address')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('locality_id');
            $table->unsignedBigInteger('neighborhood_id');
            $table->text('admin_name')->collation('utf8_spanish_ci')->nullable();
            $table->text('telephone')->collation('utf8_spanish_ci')->nullable();
            $table->text('email')->collation('utf8_spanish_ci')->nullable();
            $table->text('residential_units')->collation('utf8_spanish_ci')->nullable();
            $table->date('current_contract_end_date')->nullable();
            $table->date('contract_init_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->date('last_notification')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->text('logo')->collation('utf8_spanish_ci')->nullable();
            $table->integer('state')->default(3);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
