<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visit_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_spanish_ci');
            $table->string('module')->collation('utf8_spanish_ci');
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('visit_types');
    }
};