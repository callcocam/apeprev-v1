<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoPlanoInstituicaoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_plano_instituicao_tipo', function (Blueprint $table) {
            $table->foreignUuid('evento_plano_id')->nullable()->constrained('evento_planos')->cascadeOnDelete();
            $table->foreignUuid('instituicao_tipo_id','evento_plano_id_instituicao_tipo_id_foreign')->nullable()->constrained('instituicao_tipos')->cascadeOnDelete();
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
        Schema::dropIfExists('evento_plano_instituicao_tipo');
    }
}
