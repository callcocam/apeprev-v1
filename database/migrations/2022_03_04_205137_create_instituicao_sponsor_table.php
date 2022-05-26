<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaoSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_sponsor', function (Blueprint $table) {
            $table->foreignUuid('instituicao_id')->nullable()->constrained('instituicoes')->cascadeOnDelete();
            $table->foreignUuid('sponsor_id')->nullable()->constrained('sponsors')->cascadeOnDelete();
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
        Schema::dropIfExists('instituicao_sponsor');
    }
}
