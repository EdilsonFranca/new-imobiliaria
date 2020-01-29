@extends('layout.principal-admin')
@section('conteudo')
@if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
<form action="/imoveis/adiciona" method="post" enctype="multipart/form-data" class="px-3">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	@yield('form')
	<input type="hidden" name="id" value="{{ old('id')?? $imovel->id ??'' }}">
	<input type="hidden" name="id_endereco" value="{{ old('id_endereco')?? $imovel->endereco->id_endereco ??'' }}">
	<input type="hidden" name="id_proprietario" value="{{ old('id_proprietario')?? $imovel->proprietario->id_proprietario??'' }}">
	<div class="row " style="border:thin solid #708090 ; margin-top: 10px;">
		<div class=" text-center col-md-12 " style="background: #ddd">
			<h4>Cadastro de Imoveis</h4>
		</div>
		<div class="form-group col-md-9">
			<label>Titulo</label>
			<input type="text" name="titulo" class="form-control" value="{{ old('titulo')?? $imovel->titulo ??'' }}" />
		</div>
		<div class=" col-md-3">
			<label> Destaque </label>
			<input type="checkbox" name="destaque" class="form-control" value="{{ old('destaque')?? $imovel->destaque ??'' }}"  @if(isset($imovel->destaque)&& $imovel->destaque ==1) checked value="1" @endif/>
		</div>
		<div class=" col-md-2">
			<label for="dormitorio">Dormitorio:</label>
			<input type="number" name="dormitorio" class="form-control" value="{{ old('dormitorio')?? $imovel->dormitorio ??'' }}" />
		</div>
		<div class=" col-md-2">
			<label for="suite">Suite:</label>
			<input type="number" name="suite" class="form-control" value="{{ old('suite')?? $imovel->suite ??'' }}" />
		</div>
		<div class="form-group col-md-2">
			<label for="vaga">Vaga:</label>
			<input type="number" name="vaga" class="form-control" value="{{ old('vaga')?? $imovel->vaga ??'' }}" />
		</div>
		<div class="form-group col-md-2">
			<label for="banheiro">Banheiro:</label>
			<input type="number" name="banheiro" class="form-control" value="{{ old('banheiro')?? $imovel->banheiro ??'' }}" />
		</div>
		<div class="form-group col-md-4">
			<label> Valor </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text">R$</span>
				</div>
				<input type="text" class="form-control" name="valor" aria-label="Amount (to the nearest dollar)" value="{{ old('valor')?? $imovel->valor ??'' }}">
				<div class="input-group-append">
					<span class="input-group-text">.00</span>
				</div>
			</div>
		</div>
		<div class="form-group col-md-3">
			<label for="Tipo De Imovel">Tipo De Imovel:</label>
			<?php $tipos = array("Apartamento", "Casa", "Sobrado", "Terreno"); ?>
			<select class="form-control" name="tipo">
				@foreach ($tipos as $tipo)
				<option @if(isset($imovel->tipo) && ($imovel->tipo == $tipo)) selected='selected' @endif value="{{$tipo}}">
					{{$tipo}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
			<?php $transacoes = array("Alugar", "Venda","Temporada","Comercial"); ?>
			<label for="Transação">Transação:</label>
			<select class="form-control" name="transacao">
				@foreach ($transacoes as $transacao)
				<option @if(isset($imovel->transacao) &&($imovel->transacao == $transacao)) selected='selected'; @endif
					value=" {{$transacao}} ">{{$transacao}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
			<label> Área </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text">m²</span>
				</div>
				<input type="text" class="form-control" name="area" aria-label="Amount (to the nearest dollar)" value="{{ old('area')?? $imovel->area ??'' }}">
			</div>
		</div>
		<div class="form-group col-md-3">
			<label> Condominio </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text">R$</span>
				</div>
				<input type="text" class="form-control" name="condominio" aria-label="Amount (to the nearest dollar)" value="{{ old('condominio')?? $imovel->condominio ?? '' }}">
				<div class="input-group-append">
					<span class="input-group-text">.00</span>
				</div>
			</div>
		</div>
		<div class="form-group col-md-8">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control" rows="5" value="{{ old('descricao') ?? $imovel->descricao ?? ''}}">{{$imovel->descricao ?? ''}}</textarea>
		</div>
		<div class="form-group col-md-4">
			<div class="col-12">
				<label>Fotos</label>
				<input type="file" class="form-control" name="photos[]" multiple value="{{ old('photo')?? $imovel->photo ??''}}" />
			</div>
			<div class="form-group col-md-12 mt-4">
				<?php $statusDoImoveis = array("Pronto para morar", "Na planta","Em construção","Lançamentos","Imovel Novo"); ?>
				<label for="statusDoImovel">Status do Imóvel</label>
				<select class="form-control" name="statusDoImovel">
					@foreach ($statusDoImoveis as $statusDoImovel)
					<option @if(isset($imovel->statusDoImovel) &&($imovel->statusDoImovel == $statusDoImovel)) selected='selected'; @endif
						value=" {{$statusDoImovel}} ">{{$statusDoImovel}}
					</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row " style="border:thin solid #708090 ;margin-top: 10px;">
		<div class="text-center col-md-12" style="background: #ddd">
			<h4>Endereço</h4>
		</div>
		<div class="form-group card-body col-md-1 ">
			<label> Numero </label>
			<input name="numero" class="form-control" type="text" value="{{ old('numero')?? $imovel->endereco->numero ??''}}" />
		</div>
		<div class="form-group card-body col-md-2 ">
			<?php $tiposLogradouro = array("AV", "Rua"); ?>
			<label> Logradouros</label>
			<select class="form-control" name="logradouro_tipo">
				@foreach ($tiposLogradouro as $tipoLogradouro)
				<option @if(isset($imovel->endereco->logradouro_tipo) && ($imovel->endereco->logradouro_tipo == $tipoLogradouro)) selected='selected'; @endif
					value=" {{$tipoLogradouro}} ">{{$tipoLogradouro}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group card-body col-md-4 ">
			<label>------ </label>
			<input name="logradouro_nome" class="form-control" type="text" placeholder="nome da rua ou avenida" value="{{ old('logradouro_nome')?? $imovel->endereco->logradouro_nome ??''}}" />
		</div>
		<div class="form-group card-body col-md-3 ">
			<label>Bairro </label>
			<input name="bairro" class="form-control" type="text" value="{{ old('bairro')?? $imovel->endereco->bairro ??''}}" />
		</div>
		<div class="form-group card-body col-md-2">
			<?php $zonas = array("Centro", "Zona Leste", "Zona Oeste", "Zona Norte", "Zona Sul"); ?>
			<label> Zona </label>
			<select class="form-control" name="zona">
				@foreach ($zonas as $zona)
				<option @if(isset($imovel->endereco->zona) && ($imovel->endereco->zona == $zona)) selected='selected'; @endif
					value=" {{$zona}} ">{{$zona}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group card-body col-md-3 ">
			<label>Cep </label>
			<input name="cep" class="form-control" type="text" value="{{ old('cep')?? $imovel->endereco->cep ??'' }}" />
		</div>
		<div class="form-group card-body col-md-3 ">
			<label>Cidade </label>
			<input name="cidade" class="form-control" type="text" value="{{ old('cidade')?? $imovel->endereco->cidade ??'' }}" />
		</div>
		<div class="form-group card-body col-md-3">
			<label>Latitude </label>
			<input name="lat" class="form-control" type="text" value="{{ old('lat')?? $imovel->endereco->lat ??'' }}" />
		</div>
		<div class="form-group card-body col-md-3">
			<label>Longitude</label>
			<input name="lng" class="form-control" type="text" value="{{ old('lng')?? $imovel->endereco->lng ??'' }}" />
		</div>
	</div>
	<div class="row" style="border:thin solid #708090 ;margin-top: 10px;">
		<div class="text-center col-md-12" style="background: #ddd">
			<h4>Proprietário</h4>
		</div>

		<div class="form-group col-md-4">
			<label>Nome </label>
			<input type="text" name="nome" class="form-control" value="{{ old('nome')?? $imovel->proprietario->nome ??''}}" />
		</div>
		<div class="form-group col-md-4">
			<label>Telefones</label>
			<input type="text" name="telefone" class="form-control" value="{{ old('telefone')?? $imovel->proprietario->telefone ??''}}" />
		</div>
		<div class="form-group col-md-4">
			<label>Email </label>
			<input type="Email" name="email" class="form-control" value="{{ old('email')?? $imovel->proprietario->email ??''}}" />
		</div>
	</div>
	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary form-control m-4" value=" cadastrar">Cadastrar</button>
	</div>
	</div>
</form>
@stop