<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // $table->datetime('last_views')->nullable()->comment('data da ultima visualização');
            // $table->integer('views')->nullable()->comment('numero de visualizacoes');
            // $table->datetime('start')->nullable()->comment('data início de vigência do plano');
            // $table->datetime('end')->nullable()->comment('data fim de vigência do plano');
            // $table->text('url')->nullable()->comment('acesso externo do site');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('last_views');
            $table->dropColumn('views');
            $table->dropColumn('start');
            $table->dropColumn('end');
            $table->dropColumn('url');
        });
    }
}
