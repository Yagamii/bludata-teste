<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorPessoaFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores_pessoa_fisica', function (Blueprint $table) {
            $table->integer('fornecedor_id')->unsigned();
            $table->string('cpf');
            $table->string('rg');
            $table->date('nascimento');
            $table->primary('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores_pessoa_fisica');
    }
}
