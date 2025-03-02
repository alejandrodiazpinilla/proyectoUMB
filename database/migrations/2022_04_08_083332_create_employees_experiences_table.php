<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->string('company_name')->collation('utf8_spanish_ci');
            $table->string('position')->collation('utf8_spanish_ci');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('immediate_boss')->collation('utf8_spanish_ci');
            $table->string('telephone');
            $table->text('functions')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_experiences');
    }
};
