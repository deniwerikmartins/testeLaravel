<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('atividades', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->increments('id');
            $table->integer('id_do_modulo')->unsigned()->index();
            $table->string('titulo');
            $table->string('descricao');
            $table->timestamp('data_de_cadastro')->useCurrent();
            $table->timestamp('data_de_alteracao')->nullable();
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('atividades');
    }
}
