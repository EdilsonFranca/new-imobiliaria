<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="assets/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/geral.css">
    @yield('css')
    <title>new imobiliaria</title>
</head>

<body>
    <header>
        <div class="top-header container-fluid row m-0 bg-secondary">
            <div class=" col-8">
            </div>
            <div class="redes-socias col-4 text-right">
                <svg class="item‐icone-facebook d-inline">
                    <use xlink:href="icon-svg/categorias.svg#facebook-lite" />
                </svg>
                <svg class="item‐icone-instagran d-inline">
                    <use xlink:href="icon-svg/categorias.svg#instagran" />
                </svg>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-0 pb-md-0">
            <div class="container-fluid nav-div mt-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-">
                        <li class="nav-item mr-5 {{ Request::path() == '/' ? 'selecionado' : '' }}">
                            <a class="nav-link nav-link-menu p-0 text-dark center" href="/">Home</a>
                        </li>
                        <li class="nav-item mr-5 {{ Request::path() == 'busca-no-mapa' ? 'selecionado' : '' }}">
                            <a class="nav-link nav-link-menu p-0 text-dark center" href="{{action('ImovelController@listaJson')}}">Busca no mapa</a>
                        </li>
                        <li class="nav-item mr-5 {{ Request::path() == 'sobre-nos' ? 'selecionado' : '' }}">
                            <a class="nav-link nav-link-menu p-0 text-dark center" href="sobre-nos">Sobre Nós</a>
                        </li>
                        <li class="nav-item mr-5 {{ Request::path() == 'fale-conosco' ? 'selecionado' : '' }}">
                            <a class="nav-link nav-link-menu p-0 text-dark center" href="{{action('FaleConoscoController@pag')}}">Fale Conosco</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('conteudo')

    <footer class="rodape-principa container-fluid  px-0 mt-2 bg-secondary">
        <p class="text-center col-12"><b>Copyright © 2019 Todos os direitos reservado</b></p>
        <div class="row">
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape">
                        <use xlink:href="icon-svg/categorias.svg#localizacao" /></svg>Onde estamos</span>
                <p>Itaquera,Rua das Pedras,<br>345,CEP 83478-459 São Paulo SP</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape">
                        <use xlink:href="icon-svg/categorias.svg#horario" /></svg> Horário de atendimento</span>
                <p>de terça à Sexta das 18:00h às 22:00h / Sábado e domingo: 18:00h às 00:00h</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span">Redes sociais</span>
                <div class="redes_sociais">
                    <a href="">
                        <i>
                            <svg class="item‐icone-rodape">
                                <use xlink:href="icon-svg/categorias.svg#facebook" />
                            </svg>
                        </i>
                    </a>
                    <a href="">
                        <i>
                            <svg class="item‐icone-rodape">
                                <use xlink:href="icon-svg/categorias.svg#instagran" />
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span">Contatos</span>
                <div class="contato-rodape">
                    <p>
                        <i>
                            <svg class="item‐icone-rodape">
                                <use xlink:href="icon-svg/categorias.svg#telefone" />
                            </svg></i>(11)95540-4040</p>
                    <p><a class="link-whatsapp" href="https://web.whatsapp.com/send?phone=5511946279867&text= isto é um teste"><i><svg class="item‐icone-rodape">
                                    <use xlink:href="icon-svg/categorias.svg#whatshap" /></svg></i>(11)995540-4040 </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-botton mt-5">
            <p class="">
                <svg class="item‐icone-rodape-botton">
                    <use xlink:href="icon-svg/categorias.svg#carta" />
                </svg>site-web@gmail.com
            </p>
        </div>
    </footer>
    </div>
</body>

</html>