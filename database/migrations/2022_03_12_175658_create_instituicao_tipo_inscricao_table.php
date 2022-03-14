<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaoTipoInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_tipo_inscricao', function (Blueprint $table) {
            $table->foreignUuid('instituicao_id')->nullable()->constrained('instituicoes')->cascadeOnDelete();
            $table->foreignUuid('tipo_inscricao_id','instituicao_id_tipo_insc_id_foreign')->nullable()->constrained('tipo_inscricaos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicao_tipo_inscricao');
    }
}
