<?php

namespace App\Http\Controllers;
use App\Imovel;
use App\Endereco;
use App\Proprietario;
use App\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller{
  public function home(){
      $imoveis_venda=Imovel::where('transacao', '=', 'venda')->where("destaque","=",1)->orderBy('id','desc')->take(3)->get();
      $imoveis_aluga=Imovel::where('transacao', '=', 'alugar')->where("destaque","=",1)->orderBy('id','desc')->take(3)->get();
      $imoveis_na_planta=Imovel::where('statusDoImovel', '=', 'Na planta')->where("destaque","=",1)->orderBy('id','desc')->take(3)->get();
      $imoveis_lancamento=Imovel::where('statusDoImovel', '=', 'Lançamentos')->orderBy('id','desc')->take(8)->get();
    return view('home')->with('imoveis_venda',$imoveis_venda)
                       ->with('imoveis_aluga',$imoveis_aluga)
                       ->with('imoveis_na_planta',$imoveis_na_planta)
                       ->with('imoveis_lancamento',$imoveis_lancamento);
  }

}
