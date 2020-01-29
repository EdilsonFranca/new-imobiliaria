<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration{
    public function up(){
        Schema::create('tbEnderecos', function (Blueprint $table) {
            $table->bigIncrements('id_endereco');
            $table->integer('numero');
            $table->string('logradouro_tipo');
            $table->string('logradouro_nome');
            $table->string('bairro');
            $table->string('zona');
            $table->string('cep');
            $table->string('cidade');
            $table->string('lat');
            $table->string('lng');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tbEnderecos');
    }
}
