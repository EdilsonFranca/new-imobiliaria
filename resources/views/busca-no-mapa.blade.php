@extends('layout.principal')
@section('css')
<title>Busca no mapa</title>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Yanone+Kaffeesatz&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/busca-no-mapa.css">
@stop
@section('conteudo')
<div class="container-fluid row p-0 m-0" style="height:550px">
    <div id="map" class="col-md-12" style="height:550px"></div>
</div>
<script>
    var map;

    function initMap() {
        var imoveis = @php echo $imoveis @endphp;
        map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-23.533773, -46.625290),
            zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow({
            maxWidth: 341
        });
        markerIcon = {
            url: 'http://image.flaticon.com/icons/svg/252/252025.svg',
            scaledSize: new google.maps.Size(30, 30),
        }
        var markers = [];
        window.onload = function() {

            imoveis.forEach(marcar);
            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });
        }

        function marcar(imovel) {
            var point = new google.maps.LatLng(imovel.endereco.lat, imovel.endereco.lng);
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: markerIcon,
            });
            markers.push(marker);
            let info = document.createElement('div');
            mapaController.adiciona(imovel, info)
            marker.addListener('click', function() {
                infoWindow.setContent(info);
                infoWindow.open(map, marker);
            });
        }
    }
</script>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"> </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCD3ebDDRJOOzeZMeiznBdIS2YXpjGko&callback=initMap" async defer></script>
<script src="/assets/js/mapaController.js"></script>
<script src="/assets/js/mapaView.js"></script>
<script>
    var mapaController = new MapaController();
    let itemController = new MapaView();
</script>
@stop