class MapaView {
    constructor(elemento) {
        this._elemento = elemento;
    }
    _template(model) {
        function cria_slider() {
            let slider='';
            let active='active';
            var x;
            for (x in model.fotos) {
                slider+=`
                <div class="carousel-item ${active} border border-secondary card-mapa">
                     <img src="${model.fotos[x].uploadedFiles}" class="d-block w-100" alt="...">
                </div>
                `;
                active=``;
            }
            return slider;
            }
            
        return `
        
        <div>
             <div class="text-center titulo-card-mapa">
                 <span>${model.tipo}</span> »» <span>${model.transacao}</span>| <span> R$ ${model.valor}</span>
            </div>
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <a target="_blank" class="link-card-mapa"  href="/imoveis/detalhe/${model.id}">
                <div class="carousel-inner">
                   ${cria_slider()}              
                </div>
                </a>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
              </div>
              <ul class="list-pane-mapa p-3 ">
                <li class="list-pane-item border-bottom text-capitalize">
                    <svg class="item‐icone">
                        <use xlink:href="icon-svg/categorias.svg#quarto" />
                    </svg>
                    dormitorio ${model.dormitorio}
                </li>
                <li class="list-pane-item border-bottom text-capitalize">
                     <svg class="item‐icone">
                         <use xlink:href="icon-svg/categorias.svg#suite" />
                      </svg>
                      suite ${model.suite}
                </li>
                <li class="list-pane-item border-bottom text-capitalize">
                      <svg class="item‐icone">
                          <use xlink:href="icon-svg/categorias.svg#vaga" />
                      </svg>
                      vaga ${model.vaga}
                </li>
                <li class="list-pane-item border-bottom text-capitalize">
                        <svg class="item‐icone">
                              <use xlink:href="icon-svg/categorias.svg#banheiro" />
                        </svg>
                        banheiro  ${model.banheiro}
                </li>

                </ul>
        </div>
    `};


    update(model) {
        this._elemento.innerHTML = this._template(model);
    }

}