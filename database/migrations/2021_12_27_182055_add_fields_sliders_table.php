<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->text('url')->nullable()->after('slug');
            $table->string('thumbnail',255)->nullable()->after('slug');
            $table->datetime('start_date')->nullable()->after('thumbnail');
            $table->datetime('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('thumbnail');
        });
    }
}
