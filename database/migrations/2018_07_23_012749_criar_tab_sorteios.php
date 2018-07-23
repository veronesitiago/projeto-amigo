<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabSorteios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_grupos_sessoes_sorteios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sessao')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_amigo')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_sessao')->references('id')->on('tab_grupos_sessoes');
            $table->foreign('id_usuario')->references('id')->on('tab_usuarios');
            $table->foreign('id_amigo')->references('id')->on('tab_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_grupos_sessoes_sorteios', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_sessao']);
            $table->dropForeign(['id_usuario']);
            $table->dropForeign(['id_amigo']);
        });
        Schema::dropIfExists('tab_grupos_sessoes_sorteios');
    }
}
