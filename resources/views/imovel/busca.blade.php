@extends('layout.principal-admin')
@section('conteudo')

<table class="table table-striped table-bordered" style="width:100%">
    <div class="row">
        <h4 class="col-6">Proprietario</h4>
        <div class="col-6 d-flex flex-row-reverse">
            <a class="btn btn-danger px-5" href="{{action('ImovelController@remove', $imovel->id)}}">
                Excluir
            </a>
            <a class="btn btn-info px-5 mr-3" href="{{action('ImovelController@altera', $imovel->id)}}">
                Alterar
            </a>
        </div>
    </div>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{ $imovel->proprietario->nome }}</td>
        <td>{{ $imovel->proprietario->telefone }}</td>
        <td>{{ $imovel->proprietario->email }}</td>
    </tr>
</table>
<table class="table table-striped table-bordered" style="width:100%">
    <h4>Endereço</h4>
    <tr>
        <th>Numero</th>
        <th>LogradouroTipo</th>
        <th>LogradouroNome</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Região</th>
        <th>Cep</th>
        <th>Latitude</th>
        <th>Longitude</th>
    </tr>
    <tr>
        <td>{{ $imovel->endereco->numero }}</td>
        <td>{{ $imovel->endereco->logradouro_tipo }}</td>
        <td>{{ $imovel->endereco->logradouro_nome }}</td>
        <td>{{ $imovel->endereco->bairro }}</td>
        <td>{{ $imovel->endereco->cidade }}</td>
        <td>{{ $imovel->endereco->zona }}</td>
        <td>{{ $imovel->endereco->cep }}</td>
        <td>{{ $imovel->endereco->lat }}</td>
        <td>{{ $imovel->endereco->lng }}</td>
    </tr>
</table>
<table class="table table-bordered">
    <h2>Imovel</h2>
    <tr>
        <th> Cod </th>
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
    </tr>
    <tr>
        <td>{{ $imovel->id }} </td>
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
    </tr>
</table>
<table class="table table-bordered">
    <tr>
        <th>Titulo</th>
        <td>{{ $imovel->titulo  }}</td>
    </tr>
    <tr>
        <th>Descricao</th>
        <td>{{ $imovel->descricao  }}</td>
    </tr>
</table>
</ @stop