<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_spanish_ci');
            $table->string('username')->unique();
            $table->string('email')->collation('utf8_spanish_ci');
            $table->string('password');
            $table->string('cargo')->collation('utf8_spanish_ci');
            $table->string('signature')->collation('utf8_spanish_ci')->nullable();
            $table->string('identification')->collation('utf8_spanish_ci')->nullable();
            $table->string('address')->collation('utf8_spanish_ci')->nullable();
            $table->string('contact_name')->collation('utf8_spanish_ci')->nullable();
            $table->string('contact_phone')->collation('utf8_spanish_ci')->nullable();
            $table->string('relationship')->collation('utf8_spanish_ci')->nullable();
            $table->string('shirt')->collation('utf8_spanish_ci')->nullable();
            $table->string('pant')->collation('utf8_spanish_ci')->nullable();
            $table->string('shoes')->collation('utf8_spanish_ci')->nullable();
            $table->integer('estado')->default(1);
            $table->rememberToken();
            $table->integer('user_id');
            $table->integer('customer_id')->nullable();
            $table->timestamps();
            $table->dateTime('last_date_update')->nullable()->comment('fecha de ultima actualizacion de perfil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
