<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInstituicaoVirgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituicao_vigentes', function (Blueprint $table) {
            $table->string('payment_date')->nullable();
            $table->string('valor')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instituicao_vigentes', function (Blueprint $table) {
            $table->dropColumn('payment_date');
            $table->dropColumn('valor');
            $table->dropColumn('description');
        });
    }
}
