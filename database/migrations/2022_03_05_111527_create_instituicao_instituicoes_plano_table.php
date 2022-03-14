<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaoInstituicoesPlanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_instituicoes_plano', function (Blueprint $table) {
            $table->foreignUuid('instituicao_id')->nullable()->constrained('instituicoes')->cascadeOnDelete();
            $table->foreignUuid('instituicoes_plano_id')->nullable()->constrained('instituicoes_planos')->cascadeOnDelete();
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
        Schema::dropIfExists('instituicao_instituicoes_plano');
    }
}
