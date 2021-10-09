<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_telefone', function (Blueprint $table) {
            $table->increments('pk_telefone');
            $table->string('ddd', 2);
            $table->string('telefone', 10);
            $table->integer('fk_cliente')->unsigned();
            $table->foreign('fk_cliente')->references('pk_cliente')->on('tb_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_telefone');
    }
}
