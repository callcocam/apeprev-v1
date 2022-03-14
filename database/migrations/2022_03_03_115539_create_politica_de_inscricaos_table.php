<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticaDeInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politica_de_inscricaos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->longtext('content')->nullable();
            $table->uuidMorphs('politica_de_inscricaoable','politica_de_inscricaos_p_de_i_type_p_de_i_id_index');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('politica_de_inscricaos');
    }
}
