@extends('layout.principal-admin')
@section('conteudo')
<table class="table table-striped table-bordered" style="widyh:100%">
    <tr>
        <td>Numero</td>
        <td>LogradouroTipo</td>
        <td>LogradouroNome</td>
        <td>Bairro</td>
        <td>Cidade</td>
        <td>Cep</td>
        <td>Latitude</td>
        <td>Longitude</td>
        <td>Alterar</td>
    </tr>
    <tr>
        <td>{{ $imovel->endereco->numero }}</td>
        <td>{{ $imovel->endereco->logradouroTipo }}</td>
        <td>{{ $imovel->endereco->logradouroNome }}</td>
        <td>{{ $imovel->endereco->bairro }}</td>
        <td>{{ $imovel->endereco->cidade }}</td>
        <td>{{ $imovel->endereco->zona }}</td>
        <td>{{ $imovel->endereco->cep }}</td>
        <td>{{ $imovel->endereco->lat }}</td>
        <td>{{ $imovel->endereco->lng }}</td>
        <td>
            <a href="formulario-altera-imovel.php?id=<?=$imovel->getId_imovel()?>">
                alterar
            </a>
        </td>
    </tr>
</table>
@stop