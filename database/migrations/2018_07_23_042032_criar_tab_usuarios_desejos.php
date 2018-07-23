<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabUsuariosDesejos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_usuarios_desejos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('desc_item', 255)->nullable();
            $table->decimal('valor', 8, 2)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('observacao', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::table('tab_usuarios_desejos', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_usuario']);
        });
        Schema::dropIfExists('tab_usuarios_desejos');
    }
}
