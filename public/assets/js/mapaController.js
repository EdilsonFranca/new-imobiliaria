class MapaController {
        adiciona(imovel, div) {
                let mapaView = new MapaView(div);
                mapaView.update(imovel);
        }
}