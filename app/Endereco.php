<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $table ='tbEnderecos';
    protected $primaryKey = 'id_endereco';
    public $timestamps = false;
    protected $fillable  = array('numero','logradouro_tipo','logradouro_nome','zona','bairro','cep','cidade','lat','lng');
}
