<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/detalhe.css">
    <link rel="stylesheet" href="/assets/css/geral.css">
    <title>{{substr($imovel->titulo, 0, 20)}}</title>
</head>

<body>
    <div class="container body-detalhe mt-2">
        <div class="row">
            <div class="col-sm-7">
                <div class="text-center titulo-principal-div">
                    <h4 class="titulo-principal">{{substr($imovel->titulo, 0, 55)}}</h4>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        @php $subclass = "active" @endphp
                        @for($i=0;$i < count($imovel->fotos);++$i)  @php $num=$i+1; @endphp
                        <div class="carousel-item {{ $subclass }}">
                            <img src="/{{ $imovel->fotos[$i]->uploadedFiles }}" class="border border-secondary p-0 rounded-left" alt="img1" height="100%">
                            @php echo"<span class='num-fotos'>".$num." / ".count($imovel->fotos)."</span>" @endphp
                        </div>
                        @php $subclass = '' ; @endphp
                        @endfor
                        <svg class="item‐icone-foto position-absolute">
                            <use class="item‐icone-foto-use position-absolute" xlink:href="/icon-svg/categorias.svg#foto" />
                        </svg>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row">
                    <div class="card-imovel-descricao col-md-12 mt-3">
                        <div class="border border-secondary">
                            <div class="col-sm-12 text-center">
                                <p>
                                    <h2 class="h5 titulo-card">{{ $imovel->tipo}} a {{$imovel->transacao}} <span class="preco"> R$ @php echo number_format($imovel->valor, 2, ",", ".")  @endphp </span></h2>
                                </p>
                            </div>
                            <div class="col-sm-12  px-0 my-3 text-center border border-secondary bg-white">
                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#quarto" />
                                    </svg>
                                    {{ $imovel->dormitorio}} dorm
                                </span>
                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#banheiro" />
                                    </svg>
                                    {{ $imovel->banheiro}} banheiro
                                </span>
                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#suite" />
                                        
                                    </svg>
                                    {{ $imovel->suite}} suite
                                </span>

                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#vaga" />
                                    </svg>
                                    {{ $imovel->vaga}} vaga
                                </span>
                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#area" />
                                    </svg>
                                    Área {{ $imovel->area}} <small>m²</small>
                                </span>
                                <span class="descricao-item">
                                    <svg class="item‐icone-info">
                                        <use xlink:href="/icon-svg/categorias.svg#dinheiro" />
                                    </svg>
                                    condominio R${{ $imovel->condominio}}
                                </span>

                            </div>
                            <article class="col-sm-12 descricao-text justificado-certo ">{{$imovel->descricao}}</article>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="col-md-12 mt-4">
                        <div class="col-sm-12 endereco">
                            <svg class="item‐icone-info">
                                <use xlink:href="/icon-svg/categorias.svg#localizacao" />
                            </svg>
                            <span class="cep"> {{ $imovel->endereco->cep}} »</span> {{ $imovel->endereco->cidade}}» {{ $imovel->endereco->bairro}}»{{ $imovel->endereco->logradouro_tipo}} {{ $imovel->endereco->logradouro_nome}}
                        </div>
                        @php $enderecoM=$imovel->endereco->logradouroTipo." ".$imovel->endereco->logradouroNome." ".$imovel->endereco->bairro; @endphp

                        <input type="hidden" id="txtEndereco" name="txtEndereco" value="{{$enderecoM}}" />
                    </form>
                    <div class="col-sm-12 localizacao_mapa my-2">
                        <div id="mapa" class="col-sm-12" style="background-image: url('/assets/imagen-sistema/mapaFotos.png');">
                            <button class="div-mapa text-center">
                                <svg class="item‐icone-localizacao">
                                    <use xlink:href="/icon-svg/categorias.svg#mapa" />
                                </svg>
                                <span>Navegar pelo mapa</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <p class="text-danger mb-1">{{ $error }}</p>
                        @endforeach
                @endif
                <div class="formulario">
                    <form action="/send-email" method="post" id="form_contato">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="divForm col-sm-12 p-0">
                            <h3 class="text-center">Entre em contato</h3>
                            <tr>
                                <td><span class="">Nome</span></td>
                                <td>
                                    <input class="form-control mb-3" type="text" name="nome" id="nome" value="{{ old('nome') }}">
                                    <span class='msg-erro msg-nome'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="">Email</span></td>
                                <td>
                                    <input class="form-control mb-3" type="email" name="email" id="email" value="{{ old('email') }}">
                                    <span class='msg-erro msg-email'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="">Tell</span></td>
                                <td>
                                    <input class="form-control mb-3 phone" type="text" name="telefone" id="tel" value="{{ old('telefone') }}">
                                    <span class='msg-erro msg-tell'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="">Mensagem</span></td>
                                <td>
                                    <textarea class="form-control mb-3" name="mensagem" id="mensagem">Olá, visualizei este anúncio e gostaria que entrasse em contato comigo. id do imovel</textarea>
                                    <span class='msg-erro msg-mensagem'></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnButom" class="btn btn-primary btn-block" type="submit" name="submit">enviar</button>
                                </td>
                            </tr>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="contato-rodape container-fluid border mt-1 bg-primary">
        <div class="row ">
            <div class="col-sm-6 col-xs-12 text-center text-white p-3">
                <h5>QUER COMPRAR OU VENDER UM IMOVEL ?</h5>
            </div>
            <div class="col-sm-3 col-xs-12 text-center text-white p-3">
                <h5>LIGUE AGORA (11)98392-5371</h5>
            </div>
            <div class="col-sm-2 col-xs-12 text-center text-white p-3">
                <a class="form-control  chamada-btn-link" href="/fale-conosco"> Entre em Contato</a>
            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCD3ebDDRJOOzeZMeiznBdIS2YXpjGko&callback=initMap" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/js/mapa.js"></script>
    <script type="text/javascript" src="/assets/js/detalhe.js"></script>
    <footer class="rodape-principa container-fluid  px-0 mt-2 bg-secondary">
        <p class="text-center col-12"><b>Copyright © 2019 Todos os direitos reservado</b></p>
        <div class="row">
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape">
                        <use xlink:href="/icon-svg/categorias.svg#localizacao" /></svg>Onde estamos</span>
                <p>Itaquera,Rua das Pedras,<br>345,CEP 83478-459 São Paulo SP</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape">
                        <use xlink:href="/icon-svg/categorias.svg#horario" /></svg> Horário de atendimento</span>
                <p>de terça à Sexta das 18:00h às 22:00h / Sábado e domingo: 18:00h às 00:00h</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span">Redes sociais</span>
                <div class="redes_sociais">
                    <a href="">
                        <i>
                            <svg class="item‐icone-rodape">
                                <use xlink:href="/icon-svg/categorias.svg#facebook" />
                            </svg>
                        </i>
                    </a>
                    <a href="">
                        <i>
                            <svg class="item‐icone-rodape">
                                <use xlink:href="/icon-svg/categorias.svg#instagran" />
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
                                <use xlink:href="/icon-svg/categorias.svg#telefone" />
                            </svg></i>(11)95540-4040</p>
                    <p><a class="link-whatsapp" href="https://web.whatsapp.com/send?phone=5511946279867&text= isto é um teste"><i><svg class="item‐icone-rodape">
                                    <use xlink:href="/icon-svg/categorias.svg#whatshap" /></svg></i>(11)995540-4040 </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-botton mt-5">
            <p class="">
                <svg class="item‐icone-rodape-botton">
                    <use xlink:href="/icon-svg/categorias.svg#carta" />
                </svg>site-web@gmail.com
            </p>
        </div>
    </footer>
    </div>
</body>

</html>