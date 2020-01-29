@extends('layout.principal')
@section('css')
<link rel="stylesheet" href="assets/css/fale-conosco.css">
<title>Fale Conosco</title>
@stop
@section('conteudo')
<div class="container-fluid  py-4 container-prinncipal">
    <p class="text-{{ $tipo ?? ''}} text-center"> {{ $msn ?? ''}}</p>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-7 px-2">
            <section class="col-md-12 px-0">
                <form action="/send-email" method="post" name="form1" enctype="multipart/form-data" class="formulario-fale-conosco">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="input-field">
                        <input id="nome" type="text" class="validate" name="nome" value="{{ old('nome') }}">
                        <label for="name">Nome</label>
                    </div>
                    <div class="input-field">
                        <input id="telefone" type="text" class="validate" name="telefone" value="{{ old('telefone') }}">
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="input-field">
                        <input id="email" type="text" class="validate" name="email" value="{{ old('email') }}">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-field">
                        <textarea class="validate" name="mensagem" id="msg" cols="30" rows="3">{{ old('mensagem') }}</textarea>
                        <label for="msg">Mensagem</label>
                    </div>
                    <input class="buttom" type="submit" value="enviar" />
                    <input class="buttom" type="reset" value="limpar" />
                </form>
            </section>
        </div>
        <div class="col-md-5 contato-backgraund ">
            <div class="text-center mt-5 row">
                <span class=" px-3 py-1 col-sm-4">
                    <svg class="item‐icone tell-contato-svg">
                        <use xlink:href="/icon-svg/categorias.svg#telefone" />
                    </svg>
                </span>
                <span class="tell-contato-span col-sm-8">55(11)4560-9037</span>
            </div>
            <div class="text-center mt-5 row">
                <span class="px-3 py-1 col-sm-4">
                    <svg class="item‐icone whatshapp-contato-svg ">
                        <use xlink:href="/icon-svg/categorias.svg#whatshap" />
                    </svg>
                </span>
                <span class="whatshapp-contato-span col-sm-8 pl-0">(11)98745-7865</span>
            </div>
            <div class="text-center mt-5 row">
                <span class=" px-3 py-1 col-sm-4">
                    <svg class="item‐icone email-contato-svg">
                        <use xlink:href="/icon-svg/categorias.svg#carta" />
                    </svg>
                </span>
                <span class="email-contato-span col-sm-8"> newImobiliariaContato.com.br</span>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/fale-conosco.js"></script>
@stop