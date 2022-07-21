<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEventoInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento_inscritos', function (Blueprint $table) {
            $table->dropForeign('evento_inscritos_hotel_id_foreign');
            $table->dropColumn('hotel_id');
            $table->integer('hotel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento_inscritos', function (Blueprint $table) {
            $table->dropColumn('hotel');
        });
    }
}
