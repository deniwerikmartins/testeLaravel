<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->timestamp('data_de_cadastro')->useCurrent();
            $table->timestamp('data_de_alteracao')->nullableTimestamps();
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
        Schema::drop('modulos');
    }
}