<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('termination_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->date('retirement_date');
            $table->unsignedBigInteger('retirement_type_id');
            $table->text('attached')->collation('utf8_spanish_ci')->nullable();
            $table->text('description')->collation('utf8_spanish_ci')->nullable();
            $table->unsignedBigInteger('state_id')->default(15)->comment('15:Pendiente Por Aprobar');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('state_terminations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('retirement_type_id')->references('id')->on('retirement_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('termination_staff');
    }
};