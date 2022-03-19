<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHotelIdEventoInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento_inscritos', function (Blueprint $table) {
            $table->foreignUuid('hotel_id')->nullable()->constrained('hotels')->cascadeOnDelete();
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
            $table->dropColumn('hotel_id');
        });
    }
}
