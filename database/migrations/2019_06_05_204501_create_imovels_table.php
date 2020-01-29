<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelsTable extends Migration{
    public function up(){
        Schema::create('tbImoveis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->integer('dormitorio');
            $table->integer('suite');
            $table->integer('vaga');
            $table->integer('banheiro')->default(1);
            $table->boolean('destaque')->default(false);
            $table->decimal('valor', 9, 2);
            $table->string('tipo');
            $table->string('area');
            $table->decimal('condominio', 9, 2);
            $table->string('transacao');
            $table->string('statusDoImovel');
            $table->string('descricao');
            $table->string('imovel_para');
            $table->unsignedBigInteger('endereco_id')->unsigned();
            $table->unsignedBigInteger('proprietario_id')->unsigned();
            $table->foreign('endereco_id')->references('id_endereco')->on('tbEnderecos')->onDelete('cascade');
            $table->foreign('proprietario_id')->references('id_proprietario')->on('tbProprietarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tbImoveis');
    }
}
