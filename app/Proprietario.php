<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model{
	protected $table ='tbProprietarios';
	protected $primaryKey = 'id_proprietario';
	public $timestamps = false;
	protected $fillable  = array('nome','telefone','email');
}
