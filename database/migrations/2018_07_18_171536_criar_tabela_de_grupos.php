<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDeGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_moderador')->unsigned();
            $table->string('desc_grupo', 255)->nullable();
            $table->string('observacao', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_moderador')->references('id')->on('tab_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_grupos', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_moderador']);
        });
        Schema::dropIfExists('tab_grupos');
    }
}
