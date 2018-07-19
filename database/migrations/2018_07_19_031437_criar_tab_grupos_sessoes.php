<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabGruposSessoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_grupos_sessoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grupo')->unsigned();
            $table->string('desc_sessao', 255)->nullable();
            $table->dateTime('data_sorteio');
            $table->decimal('valor_presente_ate', 8, 2)->nullable();
            $table->dateTime('data_confraternizar');
            $table->string('local', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_grupo')->references('id')->on('tab_grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_grupos_sessoes', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_grupo']);
        });
        Schema::dropIfExists('tab_grupos_sessoes');
    }
}
