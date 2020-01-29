<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@home');
Route::get('/fale-conosco', 'FaleConoscoController@pag');
Route::get('/sobre-nos', 'SobreNosController@pag');
Route::get('/busca-no-mapa', 'ImovelController@listaJson');
Route::post('send-email', 'EmailController@sendEMail');
Route::get('/imoveis/busca/{id}', 'ImovelController@busca');
Route::get('/imoveis/detalhe/{id}', 'ImovelController@detalhe');
Route::any('search/', 'ImovelController@search')->name('search');
Route::get('/imoveis', 'ImovelController@listaImovel')->middleware("auth");
Route::get('/imoveis/novo', 'ImovelController@novo')->middleware("auth");
Route::get('/imoveis/alterar/{id}', 'ImovelController@altera')->middleware("auth");
Route::get('/imoveis/remover/{id}', 'ImovelController@remove')->middleware("auth");
Route::match(array('GET', 'POST'), '/imoveis/adiciona', 'ImovelController@adiciona')->middleware("auth");
Route::any('search-admin/', 'ImovelController@listaImovel')->name('search-admin')->middleware("auth");
