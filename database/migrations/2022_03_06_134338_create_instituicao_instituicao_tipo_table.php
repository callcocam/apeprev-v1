<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaoInstituicaoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_instituicao_tipo', function (Blueprint $table) {
            $table->foreignUuid('instituicao_id')->nullable()->constrained('instituicoes')->cascadeOnDelete();
            $table->foreignUuid('instituicao_tipo_id','instituicao_i_t_i_t_id_foreign')->nullable()->constrained('instituicao_tipos')->cascadeOnDelete();
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
        Schema::dropIfExists('instituicao_instituicao_tipo');
    }
}
