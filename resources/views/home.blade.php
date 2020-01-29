@extends('layout.principal')
@section('css')
<link rel="stylesheet" href="assets/css/carousel.css">
<link rel="stylesheet" href="assets/css/slider.css">
<link rel="stylesheet" href="assets/css/home.css">
@stop
@section('conteudo')
<main class="container-fluid p-0">
    <div class="banner-principal">
        <div class="banner-principal-div">
            <div class="banner-principal-div-img" style="background-image: url(imagem-slider/city-2278497_1920.jpg)">
                <div class="filtro_principal row">
                    <form class="formulario_principal col-12" action="{{ route('search') }}">
                        <div class="formulario_principal_div col-md-9 form-inline mx-auto p-0 p-md-4">
                            <div class="col-12 row px-0 py-3 m-auto">
                                <ul class="operation-type-menu m-auto  form-inline">
                                    <li class=" list-li">
                                        <input type="checkbox" id="compra" name="transacoes[]" value="Venda" checked>
                                        <label class="button-top-filtro btn btn-outline-success btn-sm rounded-pill" for="compra"> Comprar </label>
                                    </li>
                                    <li class=" list-li">
                                        <input type="checkbox" id="alugar" name="transacoes[]" value="Alugar">
                                        <label class="button-top-filtro btn btn-outline-success btn-sm rounded-pill" for="alugar"> Alugar </label>
                                    </li>
                                    <li class=" list-li">
                                        <input type="checkbox" id="imovel-novo" name="statusDoImovel" value="Imovel Novo">
                                        <label class="button-top-filtro btn btn-outline-success btn-sm rounded-pill" for="imovel-novo"> Imóvel Novo </label>
                                    </li>
                                    <li class=" list-li">
                                        <input type="checkbox" id="Comercial" name="transacoes[]" value="Comercial">
                                        <label class="button-top-filtro btn btn-outline-success btn-sm rounded-pill" for="Comercial"> Comercial</label>
                                    </li>
                                    <li class=" list-li">
                                        <input type="checkbox" id="Temporada" name="transacoes[]" value="Temporada">
                                        <label class="button-top-filtro btn btn-outline-success btn-sm rounded-pill" for="Temporada"> Temporada </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="collapse col-12 row px-0 py-3 m-auto" id="collapseExample">
                                <div class="text-white col-12 row px-0 py-3 m-auto">
                                    <ul class="form-inline col-3 pl-0">
                                        <small class="mr-1">Quarto(s)</small>
                                        <li class="item list-li">
                                            <input name="quarto" type="radio" class="input_dormitorio" id="quarto1" value="1">
                                            <label class=" btn btn-outline-success btn-sm" for="quarto1"> 1+
                                            </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="quarto" type="radio" class="input_dormitorio" id="quarto2" value="2">
                                            <label class=" btn btn-outline-success btn-sm" for="quarto2"> 2+
                                            </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="quarto" type="radio" class="input_dormitorio" id="quarto3" value="3">
                                            <label class=" btn btn-outline-success btn-sm" for="quarto3"> 3+
                                            </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="quarto" type="radio" class="input_dormitorio" id="quarto4" value="4">
                                            <label class=" btn btn-outline-success btn-sm" for="quarto4"> 4+
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="form-inline col-3 pl-0">
                                        <small class="mr-1">Vaga(s)</small>
                                        <li class="item list-li">
                                            <input name="vaga" type="radio" class="input_vaga" id="vaga1" value="1">
                                            <label class=" btn btn-outline-success btn-sm" for="vaga1"> 1+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="vaga" type="radio" class="input_vaga" id="vaga2" value="2">
                                            <label class=" btn btn-outline-success btn-sm" for="vaga2"> 2+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="vaga" type="radio" class="input_vaga" id="vaga3" value="3">
                                            <label class=" btn btn-outline-success btn-sm" for="vaga3"> 3+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="vaga" type="radio" class="input_vaga" id="vaga4" value="4">
                                            <label class=" btn btn-outline-success btn-sm" for="vaga4"> 4+ </label>
                                        </li>

                                    </ul>
                                    <ul class="form-inline col-3 pl-0">
                                        <small class="mr-1">suite(s)</small>
                                        <li class="item list-li">
                                            <input name="suite" type="radio" class="input_suite" id="suite1" value="1">
                                            <label class=" btn btn-outline-success btn-sm" for="suite1"> 1+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="suite" type="radio" class="input_suite" id="suite2" value="2">
                                            <label class=" btn btn-outline-success btn-sm" for="suite2"> 2+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="suite" type="radio" class="input_suite" id="suite3" value="3">
                                            <label class=" btn btn-outline-success btn-sm" for="suite3"> 3+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="suite" type="radio" class="input_suite" id="suite4" value="4">
                                            <label class=" btn btn-outline-success btn-sm" for="suite4"> 4+ </label>
                                        </li>

                                    </ul>
                                    <ul class="form-inline col-3 pl-0">
                                        <small class="mr-1">Banheiro(s)</small>
                                        <li class="item list-li">
                                            <input name="banheiro" type="radio" class="input_banheiro"id="banheiro1" value="1">
                                            <label class=" btn btn-outline-success btn-sm" for="banheiro1"> 1+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="banheiro" type="radio" class="input_banheiro"id="banheiro2" value="2">
                                            <label class=" btn btn-outline-success btn-sm" for="banheiro2"> 2+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="banheiro" type="radio" class="input_banheiro"id="banheiro3" value="3">
                                            <label class=" btn btn-outline-success btn-sm" for="banheiro3"> 3+ </label>
                                        </li>
                                        <li class="item list-li">
                                            <input name="banheiro" type="radio" class="input_banheiro"id="banheiro4" value="4">
                                            <label class=" btn btn-outline-success btn-sm" for="banheiro4"> 4+ </label>
                                        </li>

                                    </ul>

                                </div>
                                <div class="row text-white  col-12 p-0 m-auto">
                                    <div class="col-md-6">
                                        <div class="slidesConteiner col-sm-12 ">
                                            <div class="row slider-labels">
                                                <small class="text-white">Faixa de Preço de <span class="slider-range-value1 mx-1"></span> <strong>a:</strong> <span class="slider-range-value2 mx-1"></span></small>
                                            </div>
                                            <div class="mt-3">
                                                <div class="slider-range"></div>
                                            </div>

                                            <div>
                                                <input type="hidden" name="minValue1" value="" class="min-valor">
                                                <input type="hidden" name="maxValue1" value="" class="max-valor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="slidesConteiner col-sm-12">
                                            <div class="row slider-labels">
                                                <small class="text-white">Área de <span class="slider-range-value1 mx-1"></span>m² a <span class="slider-range-value2 mx-1"></span>m²</small>
                                            </div>
                                            <div class="mt-3">
                                                <div class="slider-range"></div>
                                            </div>
                                            <div>
                                                <input type="hidden" name="minValue2" value="" class="min-valor">
                                                <input type="hidden" name="maxValue2" value="" class="max-valor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row px-0 py-3 m-auto">
                                <select name="tipo" id="propertyType" class="form-control col-4 select_tipo">
                                    <optgroup label="Apartamento">
                                        <option value="Apartamento">Apartamento</option>
                                        <option value="">Cobertura</option>
                                        <option value="">Flat</option>
                                    </optgroup>
                                    <optgroup label="Casas">
                                        <option value="Casa">Casa</option>
                                        <option value="">Casa de Condomínio</option>
                                        <option value="">Sobrado</option>
                                    </optgroup>
                                    <optgroup label="Rurais">
                                        <option value="">Rurais</option>
                                        <option value="">Chácara</option>
                                        <option value="">Fazenda</option>
                                        <option value="">Terreno</option>
                                    </optgroup>
                                </select>
                                <input class="form-control col-6 input_bairro" type="text" name="localizacao" value="" placeholder="Busca por bairro">
                                <button class="btn btn-primary col-2" onclick="redirecionar();return false"> 
                                    <i class="fas fa-search d-sm-inline"></i> 
                                    <span class="span-search d-none d-sm-inline">Search</span> 
                                </button>
                                <a class="text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Busca avançada
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="line-color mt-3"></div>
    <section class="container-fluid my-4 p-0 destaques">
        <h3 class="ml-3">Lançamentos</h3>
        <div class="top-content">
            <div class="container-fluid p-0">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php $subclass = "active"; ?>
                        @foreach ($imoveis_lancamento as $imovel)
                        <a target="_blank"  href="{{action('ImovelController@detalhe', $imovel->id)}}" class="carousel-item {{$subclass}} col-12 col-sm-6 p-0 ">
                        <div class="col-12 px-0" style="height: 200px">
                            <div class="row mx-1 carousel-item-row border border-secondary">
                                <figure class="mx-auto d-block col-6 border border-secondary p-0 m-0 rounded-left">
                                        <h1 class="lancamento-titulo position-absolute mt-2"> {{ $imovel->tipo}} para {{$imovel->transacao }} </h1>
                                       <img src="{{$imovel->fotos[0]->uploadedFiles}}"  height="100%" width="100%">
                                </figure>
                                <div class="col-6 border border-secondary rounded-right" style="height:100%">
                                    <ul class="list-pane px-0 pt-2">
                                        <li class="list-pane-item border-bottom text-capitalize">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#quarto" />
                                            </svg> dormitorio {{ $imovel->dormitorio  }}</li>
                                        <li class="list-pane-item border-bottom text-capitalize">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#suite" />
                                            </svg>
                                            suite {{ $imovel->suite  }}</li>
                                        <li class="list-pane-item border-bottom text-capitalize">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#vaga" />
                                            </svg>
                                            vaga {{ $imovel->vaga  }}</li>
                                        <li class="list-pane-item border-bottom text-capitalize">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#banheiro" />
                                            </svg>
                                            banheiro {{ $imovel->banheiro  }}</li>
                                        <li class="list-pane-item border-bottom text-capitalize">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#dinheiro" />
                                            </svg>
                                            <span class="d-none  d-sm-inline">valor </span> <span class="d-sm-inline">R$ @php echo number_format($imovel->valor , 2) @endphp </span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php $subclass = ''; ?>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <svg class="text-primary">
                            <use xlink:href="icon-svg/categorias.svg#seta-left" />
                        </svg>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <svg class="text-primary">
                            <use xlink:href="icon-svg/categorias.svg#seta-right" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid my-4 px-0 lançamentos">
        <h3>Destaques</h3>
        <div class="top-content">
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item bg-danger">
                    <a class="nav-link text-white bg-dange" data-toggle="tab" href="#venda">Venda</a>
                </li>
                <li class="nav-item bg-primary">
                    <a class="nav-link bg-primary text-white" data-toggle="tab" href="#aluga">Alugar</a>
                </li>
                <li class="nav-item bg-success">
                    <a class="nav-link  bg-success text-white" data-toggle="tab" href="#na-planta">Na Planta</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="venda" class="container-fluid tab-pane pr-0 active bg-danger pr-0"><br>
                    <div class="row p-0">
                        @foreach ($imoveis_venda as $imovel)
                        <a target="_blank"  href="{{action('ImovelController@detalhe', $imovel->id)}}" class="col-md-4 link-pane">
                            <div class="col-md-12 pr-0">
                                <div class="col-12 border border-dark tab-pane-row-col-4-col-12 row px-0 mr-0 mb-2">
                                    <div class="col-md-7 px-0  tab-pane-col-7">
                                        <p class="p-titulo position-absolute text-center">
                                            {{ $imovel->tipo}}
                                        </p>
                                        <img src="{{$imovel->fotos[0]->uploadedFiles}}" alt="" class="border-right" height="200px" width="100%">
                                    </div>
                                    <ul class="col-md-5 list-pane bg-white  mb-0 py-1">
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#quarto" />
                                            </svg>
                                            dormitorio {{ $imovel->dormitorio  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#suite" />
                                            </svg>
                                            suite {{ $imovel->suite  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#vaga" />
                                            </svg>
                                            vaga {{ $imovel->vaga  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#banheiro" />
                                            </svg>
                                            banheiro {{ $imovel->banheiro  }}</li>
                                        <li class="list-pane-item border-bottom preco">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#dinheiro" />
                                            </svg>
                                            R$ @php echo number_format($imovel->valor , 2) @endphp</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div id="aluga" class="container-fluid tab-pane pr-0 fade bg-primary"><br>
                    <div class="row">
                        @foreach ($imoveis_aluga as $imovel)
                        <a target="_blank"  href="{{action('ImovelController@detalhe', $imovel->id)}}" class="col-md-4 link-pane">
                            <div class="col-md-12 pr-0">
                                <div class="col-md-12 border border-dark tab-pane-row-col-4-col-12 row px-0 mb-2 mr-0">
                                    <div class="col-md-7 px-0  tab-pane-col-7">
                                        <p class="p-titulo position-absolute text-center">
                                            {{ $imovel->tipo}}
                                        </p>
                                        <img src="{{$imovel->fotos[0]->uploadedFiles}}" alt="" class="border-right" height="200px" width="100%">
                                    </div>
                                    <ul class="list-pane bg-white col-md-5 mb-0 py-1">
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#quarto" />
                                            </svg>
                                            dormitorio {{ $imovel->dormitorio  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#suite" />
                                            </svg>
                                            suite {{ $imovel->suite  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#vaga" />
                                            </svg>
                                            vaga {{ $imovel->vaga  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#banheiro" />
                                            </svg>
                                            banheiro {{ $imovel->banheiro  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#dinheiro" />
                                            </svg>
                                            R$ @php echo number_format($imovel->valor , 2) @endphp</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div id="na-planta" class="container-fluid tab-pane pr-0 fade bg-success"><br>
                    <div class="row">
                        @foreach ($imoveis_na_planta as $imovel)
                        <a target="_blank" href="{{action('ImovelController@detalhe', $imovel->id)}}" class="col-md-4 link-pane">
                            <div class="col-md-12 pr-0">
                                <div class="col-md-12 border border-dark tab-pane-row-col-4-col-12 row px-0 mb-2 mr-0">
                                    <div class="col-md-7 px-0  tab-pane-col-7">
                                        <p class="p-titulo position-absolute text-center">
                                            {{ $imovel->tipo}}
                                        </p>
                                        <img src="{{$imovel->fotos[0]->uploadedFiles}}" alt="" class="border-right" height="200px" width="100%">
                                    </div>
                                    <ul class="list-pane bg-white col-md-5 mb-0 py-1">
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#quarto" />
                                            </svg>
                                            dormitorio {{ $imovel->dormitorio  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#suite" />
                                            </svg>
                                            suite {{ $imovel->suite  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#vaga" />
                                            </svg>
                                            vaga {{ $imovel->vaga  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#banheiro" />
                                            </svg>
                                            banheiro {{ $imovel->banheiro  }}</li>
                                        <li class="list-pane-item border-bottom">
                                            <svg class="item‐icone">
                                                <use xlink:href="icon-svg/categorias.svg#dinheiro" />
                                            </svg>
                                            R$ @php echo number_format($imovel->valor , 2) @endphp</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/url-amigavel.js"></script>
<script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/slider1.js"></script>
<script src="assets/js/slider2.js"></script>
<script>
    $('.carousel').carousel({
        interval: 90000
    })
</script>
@stop