<?php

namespace  App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ImoveisRequest;
use App\Imovel;
use App\Endereco;
use App\Proprietario;
use App\Foto;
use Request;

class ImovelController extends Controller{
  public function __construct(){
    $this->middleware('auth', ['only' => ['adiciona', 'remove','altera','listaImovel','novo']]);
}

  //busca todos
  public function listaImovel(Imovel $imovel){
    $tipo = Request::input('tipo', '');
    $transacao = Request::input('transacoes', '');
    $minValue1 = Request::input('minValue1', '0');
    $maxValue1 = Request::input('maxValue1', '10000000.00');
    $localizacao = Request::input('localizacao', '');
    $dataForm = Request::all();
    $imoveis = $imovel->search($dataForm);
    return view('imovel.listagem')
          ->with('dataForm', $dataForm)
          ->with('imoveis', $imoveis)
          ->with('tipo', $tipo)
          ->with('transacoes', $transacao)
          ->with('minValue1', $minValue1)
          ->with('maxValue1', $maxValue1)
          ->with('localizacao', $localizacao);
  }

  //busca todos json
  public function listaJson(){
    $imoveis = imovel::with('fotos')->with('endereco')->get();
    return view('busca-no-mapa')->with('imoveis', $imoveis->toJson());
  }


  // busca imovel
  public function busca($id){
    $imovel = imovel::find($id);
    return view('imovel.busca')->with('imovel', $imovel);
  }

  public function detalhe($id){
    $imovel = imovel::find($id);
    return view('imovel.detalhe')->with('imovel', $imovel);
  }
  // adiciona
  public function adiciona(ImoveisRequest $request){
    if ($request->input('id') && $request->input('id_endereco') && $request->input('id_proprietario')) :
      $imovel = Imovel::find($request->input('id'));
      $endereco = Endereco::find($request->input('id_endereco'));
      $proprietario = Proprietario::find($request->input('id_proprietario'));
      $imovel->update($request->all());
      $endereco->update($request->all());
      $proprietario->update($request->all());
    else :
      $endereco = Endereco::create(Request::all());
      $proprietario = Proprietario::create(Request::all());
      $imovel = new Imovel(Request::all());
      $imovel->endereco_id = $endereco->id_endereco;
      $imovel->proprietario_id = $proprietario->id_proprietario;
      $imovel->save();
    endif;

    if ($request->has('photos')) :
      Foto::where('imovel_id', $imovel->id)->delete();
      if ($request->file('photos')) :
        foreach ($request->file('photos') as $photo) :
          $name = str_slug(substr($request->input('titulo'), 0, 25)) . '_' . md5(uniqid());
          $folder = 'images/';
          $filePath = $folder . $name . '.' . $photo->getClientOriginalExtension();
          $photo->move(public_path('images'), $filePath);
          Foto::create(['uploadedFiles' => $filePath, 'imovel_id' => $imovel->id ]);
        endforeach;
      endif;
    endif;
    return redirect()->action('ImovelController@listaImovel');
  }

  // remove imovel
  public function remove($id)
  {
    $imovel = Imovel::find($id);
    $imovel->delete();
    return redirect()->action('ImovelController@listaImovel');
  }

  public function altera($id)
  {
    $imovel = Imovel::find($id);
    return view('imovel.cadastro')->with('imovel', $imovel);
  }

  // redireciona para o formulario
  public function novo()
  {
    return view('imovel.cadastro');
  }

  public function search(Imovel $imovel) {
    $dataForm = Request::all();
    $tipo = Request::input('tipo', '');
    $transacao = Request::input('transacoes', '');
    $quarto = Request::input('quarto', '');
    $vaga = Request::input('vaga', '');
    $suite = Request::input('suite', '');
    $banheiro = Request::input('banheiro', '');
    $minValue1 = Request::input('minValue1');
    $maxValue1 = Request::input('maxValue1');
    $minValue2 = Request::input('minValue2');
    $maxValue2 = Request::input('maxValue2');
    $statusDoImovel = Request::input('statusDoImovel', '');
    $localizacao = Request::input('localizacao', '');

    $imoveis = $imovel->search($dataForm);
    return view('lista-filtrada')
      ->with('imoveis', $imoveis)
      ->with('dataForm', $dataForm)
      ->with('tipo', $tipo)
      ->with('transacoes', $transacao)
      ->with('quarto', $quarto)
      ->with('vaga', $vaga)
      ->with('suite', $suite)
      ->with('banheiro', $banheiro)
      ->with('minValue1', $minValue1)
      ->with('maxValue1', $maxValue1)
      ->with('minValue2', $minValue2)
      ->with('maxValue2', $maxValue2)
      ->with('statusDoImovel', $statusDoImovel)
      ->with('localizacao', $localizacao);
  }
}
