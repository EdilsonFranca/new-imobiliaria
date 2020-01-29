@extends('layout.principal-admin')
@section('conteudo')
<h5>Lista de Imoveis</h5>
<form class="row py-3 px-1" action="{{ route('search-admin') }}">
   @php $tiposArray = array("Apartamento","Cobertura","Flat", "Casa","Casa de Condomínio", "Sobrado", "Chácara","Fazenda","Terreno") @endphp
   <select class="form-control col-md-3 mr-1 ml-0" name="tipo">
      @foreach ($tiposArray as $tipoArray)
      <option @if(isset($tipo) && ($tipo==$tipoArray)) selected='selected' @endif value="{{$tipoArray}}">
         {{$tipoArray}}
      </option>
      @endforeach
   </select>
   @php $transacoesArray = array("Venda", "Alugar","Comercial","Temporada") @endphp
   <select class="form-control col-md-3 mx-1" name="transacoes[]">
      @foreach ($transacoesArray as $transacaoArray)
      <option @if(isset($transacao) &&($transacao==$transacaoArray)) selected='selected' ; @endif value="{{$transacaoArray}}">{{$transacaoArray}}
      </option>
      @endforeach
   </select>
   <input name="localizacao" placeholder="Bairro" class="form-control col-md-4" value="{{ $localizacao ?? ''}}" />
   <button class="btn btn-primary  mx-1 py-1" type="submit">Pesquisar</button>

   <div class="slidesConteiner my-2 col-md-6 mx-1">
      <div class="row slider-labels form-inline">
         <small class="">Preço de R$<span class="slider-range-value1 mx-1"></span> a: R$ <span class="slider-range-value2 mx-1"></span></small>
      </div>
      <div class="mt-3">
         <div class="slider-range"></div>
      </div>
      <div>
         <input type="hidden" name="minValue1" value="">
         <input type="hidden" name="maxValue1" value="">
      </div>
   </div>
</form>
<table class="table table-bordered container-fluid">

   <tr>
      <th> Cod </th>
      <th> titulo </th>
      <th> dorm </th>
      <th> suite </th>
      <th> vaga</th>
      <th> Condominio</th>
      <th> banheiro </th>
      <th> Destaque</th>
      <th> Valor</th>
      <th> Tipo</th>
      <th> Área</th>
      <th> Transação</th>
      <th> Descrição</th>
      <th> + info</th>
   </tr>
   @foreach ($imoveis as $imovel)
   <tr>
      <td>{{ $imovel->id }} </td>
      <td>{{ $imovel->titulo  }}</td>
      <td>{{ $imovel->dormitorio  }}</td>
      <td>{{ $imovel->suite  }}</td>
      <td>{{ $imovel->vaga  }}</td>
      <td>{{ $imovel->condominio  }}</td>
      <td>{{ $imovel->banheiro  }}</td>
      <td>{{ $imovel->destaque  }}</td>
      <td>{{ $imovel->valor   }}</td>
      <td>{{ $imovel->tipo  }}</td>
      <td>{{ $imovel->area  }}</td>
      <td>{{ $imovel->transacao  }}</td>
      <td>{{ $imovel->descricao  }}</td>
      <td>
         <a href="{{action('ImovelController@busca', $imovel->id)}}">
            busca>
         </a>
      </td>
      </td>
   </tr>
   <script src="assets/js/jquery-3.3.1.min.js"></script>
   <script src="assets/js/slider1.js"></script>
   @endforeach
</table>

@if (isset($dataForm))
{!! $imoveis->appends($dataForm)->links() !!}
@else
{!! $imoveis->links() !!}
@endif

@stop