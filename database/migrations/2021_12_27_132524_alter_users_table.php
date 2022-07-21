<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone',100)->nullable()->after('email');
            $table->date('birth_date')->nullable()->after('phone');
            $table->string('rg',50)->nullable()->after('birth_date');
            $table->string('cpf',50)->nullable()->after('rg');
            $table->foreignUuid('office_id')->after('cpf')->nullable()->constrained('offices')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
