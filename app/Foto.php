<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model{
	protected $table ='tbFotos';
	public $timestamps = false;
	protected $fillable  = array('uploadedFiles','imovel_id');

	public function imovel(){
		return $this->hasOne('App\Imovel','id');
	}   
}
