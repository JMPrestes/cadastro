<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->increments('pk_cliente');
            $table->string('nome', 100);
            $table->string('cpf_cnpj', 14);
            $table->date('data_nasc')->nullable();
            $table->string('rg', 15)->nullable();
            $table->string('email', 100);
            $table->string('cep', 8);
            $table->string('endereco', 80);
            $table->string('numero', 6);
            $table->string('cidade', 50);
            $table->string('estado', 2);
            $table->integer('fk_empresa')->unsigned();
            $table->foreign('fk_empresa')->references('pk_empresa')->on('tb_empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cliente');
    }
}
