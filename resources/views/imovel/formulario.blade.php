@extends('layout.principal-admin')
@section('conteudo')    
    <h4>Novo Imovel</h4>
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
    @yield('form')
@stop