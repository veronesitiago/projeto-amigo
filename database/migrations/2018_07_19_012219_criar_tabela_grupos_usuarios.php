<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaGruposUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_grupos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grupo')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_grupo')->references('id')->on('tab_grupos');
            $table->foreign('id_usuario')->references('id')->on('tab_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tab_grupos_usuarios', function (Blueprint $table) {
          Schema::disableForeignKeyConstraints();
          $table->dropForeign(['id_usuario']);
      });

      Schema::dropIfExists('tab_grupos_usuarios');
    }
}
