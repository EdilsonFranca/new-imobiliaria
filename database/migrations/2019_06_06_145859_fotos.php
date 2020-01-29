<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fotos extends Migration{
    public function up(){
        Schema::create('tbFotos', function (Blueprint $table) {
            $table->string('uploadedFiles');
            $table->unsignedBigInteger('imovel_id')->unsigned();
            $table->foreign('imovel_id')->references('id')->on('tbImoveis')->onDelete('cascade');
            $table->timestamps();
        });
    }


   
    public function down(){
        Schema::dropIfExists('tbFotos');
    }
}
