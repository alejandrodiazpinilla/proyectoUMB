<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('company_id');
            $table->text('position')->collation('utf8_spanish_ci');
            $table->unsignedBigInteger('education_level_id');
            $table->unsignedBigInteger('visit_type_id');
            $table->text('who_attends')->collation('utf8_spanish_ci')->comment('Quien Atiende la Visita. En caso de que aspirante no atienda la visita');
            $table->text('relationship')->collation('utf8_spanish_ci')->comment('parentezco de quien atiende la visita');
            $table->text('employment_situation')->collation('utf8_spanish_ci')->comment('situación laboral');
            $table->text('ease_of_transportation')->collation('utf8_spanish_ci')->comment('facilidad para transportarse');
            $table->text('type_transport')->collation('utf8_spanish_ci')->comment('¿Cómo se transporta?');
            $table->text('vehicle')->collation('utf8_spanish_ci')->comment('¿Cuál?');
            $table->text('who_live_with')->collation('utf8_spanish_ci')->comment('¿Con quien vive en el mismo domicilio?');
            $table->text('live_alone')->collation('utf8_spanish_ci')->comment('¿vive solo?');
            $table->text('family_classification')->collation('utf8_spanish_ci')->comment('Clasificación del grupo familiar');
            $table->text('specify')->collation('utf8_spanish_ci')->comment('Especifique en caso de ser necesario');
            $table->text('housing_type')->collation('utf8_spanish_ci')->comment('tipo de vivienda');
            $table->text('what_housing')->collation('utf8_spanish_ci')->comment('que tipo de vivienda');
            $table->text('own_home')->collation('utf8_spanish_ci')->comment('La vivienda es propia, en arriendo...');
            $table->text('has_bathrom')->collation('utf8_spanish_ci')->comment('tiene baño');
            $table->text('has_electricity')->collation('utf8_spanish_ci')->comment('tiene luz');
            $table->text('has_water')->collation('utf8_spanish_ci')->comment('tiene agua');
            $table->text('has_gas')->collation('utf8_spanish_ci')->comment('tiene gas natural');
            $table->text('has_thelephone')->collation('utf8_spanish_ci')->comment('tiene teléfono');
            $table->text('has_internet')->collation('utf8_spanish_ci')->comment('tiene internet');
            $table->text('has_tile')->collation('utf8_spanish_ci')->comment('tiene baldosa');
            $table->text('has_asphalt')->collation('utf8_spanish_ci')->comment('tiene cemento');
            $table->text('has_ceramic')->collation('utf8_spanish_ci')->comment('tiene cerámica');
            $table->text('another_contribution')->collation('utf8_spanish_ci')->comment('Alguien más aporta económicamente para satisfacer las necesidades básicas?');
            $table->text('name_contribution')->collation('utf8_spanish_ci')->comment('Nombre de quien aporta');
            $table->text('surname_contribution')->collation('utf8_spanish_ci')->comment('Apellido de quien aporta');
            $table->text('relationship_contribution')->collation('utf8_spanish_ci')->comment('Parentesco de quien aporta');
            $table->text('position_contribution')->collation('utf8_spanish_ci')->comment('Ocupación de quien aporta');
            $table->text('pending_documents')->collation('utf8_spanish_ci')->comment('Ha quedado pendiente algún documento por entregar');
            $table->text('truthful_information')->collation('utf8_spanish_ci')->comment('se logró constatar la veracidad de la información');
            $table->text('applicant_signature')->collation('utf8_spanish_ci')->comment('firma aspirannte');
            $table->text('interviewer_signature')->collation('utf8_spanish_ci')->comment('firma entrevistador');
            $table->text('description')->collation('utf8_spanish_ci')->comment('observaciones');
            $table->unsignedBigInteger('user_id');
            $table->integer('state')->default(1);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employe_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('visit_type_id')->references('id')->on('visit_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_visits');
    }
};
