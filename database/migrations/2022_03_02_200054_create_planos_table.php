<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->nullable(); 
            $table->float('valor',9,4)->nullable(); 
            $table->integer('max_insured')->nullable()->comment('máximo segurado');
            $table->integer('min_insured')->nullable()->comment('mínimo segurado');
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('status_id')->nullable()->constrained('statuses')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
        // Schema::table('instituicao_tipos', function (Blueprint $table) {
        //     $table->dropColumn('valor');
        //     $table->dropColumn('max_insured');
        //     $table->dropColumn('min_insured');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planos');
    }
}
