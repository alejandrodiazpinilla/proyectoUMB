<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('staff_request_candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_request_id');
            $table->string('name')->collation('utf8_spanish_ci');
            $table->string('identification', 11);
            $table->string('telephone')->collation('utf8_spanish_ci');
            $table->string('email')->collation('utf8_spanish_ci')->nullable();
            $table->text('attached')->collation('utf8_spanish_ci')->nullable();
            $table->integer('interview')->comment('0:No Enviada, 1:Enviada')->default(0);
            $table->integer('state')->comment('se cambia a 0 cuando el candidato almacenado en bd es eliminado de la tabla de candidatos de la modal')->default(1);
            $table->date('induction_date')->nullable();

            $table->foreign('staff_request_id')->references('id')->on('staff_request')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_request_candidates');
    }
};
