@extends('layout.principal')
@section('css')
<link rel="stylesheet" href="/assets/bootstrap-4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/geral.css">
<link rel="stylesheet" href="/assets/css/lista-filtrada.css">
<link rel="stylesheet" href="/assets/css/slider.css">
<title>{{$tipo}} | @if(!empty($transacoes))
    @foreach ($transacoes as $transacao)
    {{ $transacao}}
    @endforeach
    @endif
</title>
@stop
@section('conteudo')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-3  col-xs-12 ">
            <form class="col-sm-12 border border-dark p-3 sticky-top" action="{{ route('search') }}">
                @php $tiposArray = array("Apartamento","Cobertura","Flat", "Casa","Casa de Condomínio", "Sobrado", "Chácara","Fazenda","Terreno") @endphp
                <select class="form-control my-4" name="tipo">
                    @foreach ($tiposArray as $tipoArray)
                    <option @if(isset($tipo) && ($tipo==$tipoArray)) selected='selected' @endif value="{{$tipoArray}}">
                        {{$tipoArray}}
                    </option>
                    @endforeach
                </select>
                @php $transacoesArray = array("Venda", "Alugar","Comercial","Temporada") @endphp
                <select class="form-control my-4" name="transacoes[]">
                    @foreach ($transacoesArray as $transacaoArray)
                    <option @if(isset($transacoes) &&($transacoes==$transacaoArray)) selected='selected' ; @endif value="{{$transacaoArray}}">{{$transacaoArray}}
                    </option>
                    @endforeach
                </select>
                <input name="localizacao" placeholder=" Bairro" class="form-control my-4" value="{{ $localizacao ?? ''}}" />
                <ul class="item list-li px-0">
                    <span>Quartos</span>
                    @for ($i = 1; $i <= 4; $i++) <li class="item d-inline text-success mx-1 ">
                        <input name="quarto" type="radio" id="quarto{{$i}}" value="{{$i}}" hidden {{ $quarto == $i ? 'checked': '' }}>
                        <label for="quarto{{$i}}" class="btn btn-outline-success btn-sm">{{$i}}+</label>
                        </li>
                        @endfor
                </ul>
                <ul class="item list-li px-0">
                    <span class="mr-3">Vagas </span>
                    @for ($i = 1; $i <= 4; $i++) <li class="item d-inline text-success mx-1 ">
                        <input name="vaga" type="radio" id="vaga{{$i}}" value="{{$i}}" hidden {{ $vaga == $i ? 'checked': '' }}>
                        <label for="vaga{{$i}}" class="btn btn-outline-success btn-sm">{{$i}}+</label>
                        </li>
                        @endfor
                </ul>

                <ul class="item list-li px-0">
                    <span class="mr-4">Suite </span>
                    @for ($i = 1; $i <= 4; $i++) <li class="item d-inline text-success mx-1 ">
                        <input name="suite" type="radio" id="suite{{$i}}" value="{{$i}}" hidden {{ $suite == $i ? 'checked ': '' }}>
                        <label for="suite{{$i}}" class="btn btn-outline-success btn-sm">{{$i}}+</label>
                        </li>
                        @endfor
                </ul>

                <ul class="item list-li px-0">
                    <span>Banheiro </span>
                    @for ($i = 1; $i <= 4; $i++) <li class="item d-inline text-success mx-1 ">
                        <input name="banheiro" type="radio" id="banheiro{{$i}}" value="{{$i}}" hidden {{ $banheiro == $i ? 'checked ': '' }}>
                        <label for="banheiro{{$i}}" class="btn btn-outline-success btn-sm">{{$i}}+</label>
                        </li>
                        @endfor
                </ul>
                <div class="slidesConteiner col-sm-12 my-2">
                    <div class="row slider-labels">
                        <small class="">Preço de R$<span class="slider-range-value1 mx-1"></span> a: R$ <span class="slider-range-value2 mx-1"></span></small>
                    </div>
                    <div class="mt-3">
                        <div class="slider-range"></div>
                    </div>
                    <div>
                        <input type="hidden" name="minValue1" value="{{$minValue1}}">
                        <input type="hidden" name="maxValue1" value="{{$maxValue1}}">
                    </div>
                </div>
                <div class="slidesConteiner col-sm-12 my-4">
                    <div class="row slider-labels">
                        <small class="">Área de <span class="slider-range-value1 mx-1"></span>m² a <span class="slider-range-value2 mx-1"></span>m²</small>
                    </div>
                    <div class="mt-3">
                        <div class="slider-range"></div>
                    </div>
                    <div>
                        <input type="hidden" name="minValue2" value="{{$minValue2}}">
                        <input type="hidden" name="maxValue2" value="{{$maxValue2}}">
                    </div>
                </div>
                <span id="linpa-filtro">Limpar</span>
                <button class="btn btn-primary btn-block" type="submit">Pesquisar</button>
            </form>
        </div>
        <div class="col-sm-9 row mx-auto my-2 px-2">
            <div class="col-12 row" style="border-bottom: 5px solid green;height: 30px">
            <div class="col-md-6 mb-3">
                <span class="d-inline  btn-outline-success btn-sm rounded-pill border border-success">{{$tipo}}</span>
                @if(!empty($transacoes))
                @foreach ($transacoes as $transacao)
                <span class="d-inline  btn-outline-success btn-sm rounded-pill border border-success">{{ $transacao}}</span>
                @endforeach
                @endif
                @if(!empty($localizacao))
                <span class="d-inline  btn-outline-success btn-sm rounded-pill border border-success">{{ $localizacao}}</span>
                @endif
                @if(!empty($statusDoImovel))
                <span class="d-inline  btn-outline-success btn-sm rounded-pill border border-success">{{ $statusDoImovel}}</span>
                @endif
            </div>
                <div id="btnContainer" class="col-md-6 ">
                    <button class="btn btn-gride active float-right" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                    <button class="btn btn-gride float-right" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                </div>
            </div>
            @php $n = 0 @endphp
            @foreach ($imoveis as $imovel)
            <div class="col-12 col-md-12 border border-dark card-imovel column mt-3">
                <div class="row">
                    <div class="col-md-4 card-imovel-img px-0">
                        <div id="carouselExampleControls{{ $n }}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                @php $subclass = "active" @endphp
                                @for($i=0;$i < count($imovel->fotos);++$i) @php $num=$i+1; @endphp
                                    <div class="carousel-item {{ $subclass }}">
                                        <img src="/{{ $imovel->fotos[$i]->uploadedFiles }}" class="border border-secondary p-0 rounded-left" alt="img1" height="100%">
                                        @php echo"<span class='num-fotos'>".$num." / ".count($imovel->fotos)."</span>" @endphp
                                    </div>
                                    @php $subclass = '' ; @endphp
                                    @endfor
                                    <svg class="item‐icone-foto position-absolute">
                                        <use class="item‐icone-foto-use position-absolute" xlink:href="/icon-svg/categorias.svg#foto" />
                                    </svg>
                                    <a class="carousel-control-prev" href="#carouselExampleControls{{ $n }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls{{ $n }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-imovel-descricao col-md-8 p-2 mb-2">
                        <div class="col-sm-12 text-center px-0">
                            <p>
                                <h2 class="h5 titulo-card">{{ $imovel->tipo}} a {{$imovel->transacao}} <span class="preco"> R$ @php number_format($imovel->valor, 2, ",", ".") @endphp </span></h2>
                            </p>
                        </div>
                        <div class="col-sm-12 descricao px-0 my-3 text-center border border-secondary bg-white">
                            <span class="descricao-item">
                                <svg class="item‐icone-info">
                                    <use xlink:href="icon-svg/categorias.svg#quarto" />
                                </svg>
                                {{ $imovel->dormitorio}} dorm
                            </span>
                            <span class="descricao-item">
                                <svg class="item‐icone-info">
                                    <use xlink:href="icon-svg/categorias.svg#banheiro" />
                                </svg>
                                {{ $imovel->banheiro}} banheiro
                            </span>
                            <span class="descricao-item">
                                <svg class="item‐icone-info">
                                    <use xlink:href="icon-svg/categorias.svg#suite" />
                                </svg>
                                {{ $imovel->suite}} suite
                            </span>

                            <span class="descricao-item">
                                <svg class="item‐icone-info">
                                    <use xlink:href="icon-svg/categorias.svg#vaga" />
                                </svg>
                                {{ $imovel->vaga}} vaga
                            </span>
                            <span class="descricao-item">
                                <svg class="item‐icone-info">
                                    <use xlink:href="icon-svg/categorias.svg#area" />
                                </svg>
                                Área {{ $imovel->area}} <small>m²</small>
                            </span>

                        </div>
                        <div class="col-sm-12 descricao-text">
                            <article>{{substr($imovel->descricao, 0, 200)}}...</article>
                        </div>
                        <div class="col-sm-12 endereco px-0 px-sm-3">
                            <svg class="item‐icone-info">
                                <use xlink:href="icon-svg/categorias.svg#localizacao" />
                            </svg>
                            <span class="cep"> {{ $imovel->endereco->cep}} »</span> {{ $imovel->endereco->cidade}}» {{ $imovel->endereco->bairro}}»{{ $imovel->endereco->logradouro_tipo}} {{ $imovel->endereco->logradouro_nome}}
                        </div>
                        <a target="_blank" class="btn btn-outline-info  btn-sm float-right mr-2 mb-1 p-0" href="{{action('ImovelController@detalhe', $imovel->id)}}">+detalhes</a>
                    </div>
                </div>
            </div>
            @php $n++ @endphp
            @endforeach
        </div>
        @if (isset($dataForm))
        {!! $imoveis->appends($dataForm)->links() !!}
        @else
        {!! $imoveis->links() !!}
        @endif
    </div>
</div>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
<script src="/assets/js/detalhe.js"></script>
<script src="/assets/js/slider1.js"></script>
<script src="/assets/js/slider2.js"></script>
<script>
    var elements = document.getElementsByClassName("column");
    var cardImovelImg = document.getElementsByClassName("card-imovel-img");
    var cardImovelDescricao = document.getElementsByClassName("card-imovel-descricao");
    var descricaoItem = document.getElementsByClassName("descricao");
    var i;

    function listView() {
        for (i = 0; i < elements.length; i++) {
            elements[i].className = "col-md-12 border border-dark card-imovel column mt-3";
            cardImovelImg[i].className = "card-imovel-img col-md-4 px-0";
            cardImovelDescricao[i].className = "card-imovel-descricao col-md-8";
            descricaoItem[i].style.fontSize = "19px";
            elements[i].style.height = "250px"
        }
    }

    // Grid View
    function gridView() {
        if (screen.width > 600) {
            for (i = 0; i < elements.length; i++) {
                elements[i].className = "col-md-5.7 mx-auto  mt-3 border border-dark card-imovel column";
                cardImovelImg[i].className = "card-imovel-img col-md-12";
                cardImovelDescricao[i].className = "card-imovel-descricao px-2";
                descricaoItem[i].style.fontSize = "14px";
                elements[i].style.height = "490px"
            }
        } else {
            return listView();
        }
    }
    var container = document.getElementById("btnContainer");
    var btns = container.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
<script>
    $("#linpa-filtro").click(function() {
        $('input:radio').each(function(index, value) {
            $(this).attr("checked", false);
        });
    });
</script>
@stop