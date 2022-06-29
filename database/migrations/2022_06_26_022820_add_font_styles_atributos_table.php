<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFontStylesAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atributos', function (Blueprint $table) {
            $table->boolean('bold')->nullable()->after('wrap_text');
            $table->boolean('italic')->nullable()->after('bold');
            $table->boolean('underline')->nullable()->after('italic');
            $table->boolean('strikethrough')->nullable()->after('underline');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atributos', function (Blueprint $table) {
            $table->dropColumn('bold');
            $table->dropColumn('italic');
            $table->dropColumn('underline');
            $table->dropColumn('strikethrough');
        });
    }
}
