<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProprietariosTable extends Migration{
    public function up(){
        Schema::create('tbProprietarios', function (Blueprint $table) {
            $table->bigIncrements('id_proprietario');
            $table->string('nome');
            $table->string('telefone');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tbProprietarios');
    }
}
