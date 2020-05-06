
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="contact-info-map mt-20 rmt-100 mb-10 rmb-90">
    <div class="container">
        <div class="contact-info-map-inner bg-white br-10">
            <div class="row ">
                <div class="col-lg-3">
                    <div class="contact-info pl-10 pr-20 pt-40 ">
                        <div class="section-title">
                        <h2>Secteurs</h2>
                        <span class="line"></span>
                        <div class="card" style="width: 18rem;">


                            <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group dropright" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle left" style="height:100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    BATIMENT ADMINSTRATIF
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <a class="dropdown-item" href="#">Mairie</a>
                                      <a class="dropdown-item" href="#">Police</a>
                                  </div>
                                </div>
                                <div class="btn-group dropright" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle left" style="height:100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      SANTE
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <a class="dropdown-item" href="#">Hopitaux</a>
                                      <a class="dropdown-item" href="#">Pharmacie</a>
                                      <a class="dropdown-item" href="#">Poste de sante</a>
                                      <a class="dropdown-item" href="#">Maternite</a>
                                    </div>
                                </div>
                                <div class="btn-group dropright" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle left" style="height:100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      EDUCATION ET FORMATION
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <a class="dropdown-item" href="#">Colleges</a>
                                      <a class="dropdown-item" href="#">Lycées</a>
                                      <a class="dropdown-item" href="#">Centre de formation</a>
                                      <a class="dropdown-item" href="#">Ecoles coraniques</a>
                                    </div>
                                </div>
                                <div class="btn-group dropright" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle left" style="height:100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      LIEU DE SPORT LOISIR ET CULTE
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <a class="dropdown-item" href="#">Stades</a>
                                      <a class="dropdown-item" href="#">Centre culturel</a>
                                      <a class="dropdown-item" href="#">Piscine</a>
                                      <a class="dropdown-item" href="#">Centre Musical</a>
                                      <a class="dropdown-item" href="#">Salle de sport</a>
                                    </div>
                                </div>
                                <div class="btn-group dropright" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle left" style="height:100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      COMMERCE
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Marches</a>
                                        <a class="dropdown-item" href="#">station d'essence</a>
                                        <a class="dropdown-item" href="#">Magasin</a>
                                        <a class="dropdown-item" href="#">Centre Musical</a>
                                        <a class="dropdown-item" href="#">Salle de sport</a>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="contact-map">
                        <div class="outer-container">
                            <div class="map-outer">
                                <div class="" id="map">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <script>
        var map;
        function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 14.4350715, lng: -16.7925748},
            zoom: 16.2
        });
        var drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.MARKER,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
          },
          markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
          circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
          }
        });
        drawingManager.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ4VA-48dfvFRR4ITUfCeErMBpWgli4cQ&libraries=drawing&callback=initMap"
    async defer></script>






    {{-- <!-- Fichiers Javascript -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type="text/javascript">
        // On initialise la latitude et la longitude de Paris (centre de la carte)
        var lat = 14.4350715;
        var lon = -16.7925748;
        var macarte = null;
        var iconBase = 'assets/images/';
        var points = {
            "IMCEC Sandiara": { "lat": 14.434420461319409, "lon": -16.792806386947632 },
            };
        var magasins = {
            "Habilo Magasin": { "lat": 14.434763336506181, "lon": -16.791014671325684 },
            };
        var marches = {
            "Marches Sandiara": { "lat": 14.435386744583505, "lon": -16.79157257080078 },
            "2eme marché 《daralle sandiara》": { "lat": 14.43691408699362, "lon": -16.796261072158813 },
            };
        var pharmacies = {
           "Pharmacie Ya Latif": { "lat": 14.435023090083915, "lon": -16.792398691177368 },
            };
        var mosques = {
            "Mosque Sandiara": { "lat": 14.436488094586286, "lon": -16.792924404144287 },
            };
        var stades = {
            "Stade sandiara": { "lat": 14.432664516479022, "lon": -16.79682970046997 },
            };
        var stations = {
            "Station EDK Sandiara": { "lat": 14.435740008385615, "lon": -16.80006980895996 },
            "Station OLA": { "lat": 14.434472412139245, "lon": -16.78934633731842 },
        };

        // Fonction d'initialisation de la carte
        function initMap() {
            // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
            macarte = L.map('map').setView([lat, lon], 15.5);
            // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiamV5bGFuaWkiLCJhIjoiY2s3eWtyejI1MDdiYjNlbXlpdXJ1cXYxbCJ9.cRUGNYl4JynLXLZSQb5Smw'
            }).addTo(macarte);

            for (point in points) {
		    var marker = L.marker([points[point].lat, points[point].lon]).addTo(macarte);
            marker.bindPopup(point);
	        }

            for (station in stations) {
            var myIcon = L.icon({
                iconUrl: iconBase + "stationv1.png",
                iconSize: [50, 50],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([stations[station].lat, stations[station].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(station);
	        }

            for (magasin in magasins) {
            var myIcon = L.icon({
                iconUrl: iconBase + "magasin.png",
                iconSize: [40, 40],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([magasins[magasin].lat, magasins[magasin].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(magasin);
	        }

            for (stade in stades) {
            var myIcon = L.icon({
                iconUrl: iconBase + "stadev1.png",
                iconSize: [50, 50],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([stades[stade].lat, stades[stade].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(stade);
	        }

            for (marche in marches) {
            var myIcon = L.icon({
                iconUrl: iconBase + "panierv.png",
                iconSize: [40, 40],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([marches[marche].lat, marches[marche].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(marche);
	        }

            for (pharmacie in pharmacies) {
            var myIcon = L.icon({
                iconUrl: iconBase + "pharmaciev.png",
                iconSize: [40, 40],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([pharmacies[pharmacie].lat, pharmacies[pharmacie].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(pharmacie);
	        }

            for (mosque in mosques) {
            var myIcon = L.icon({
                iconUrl: iconBase + "mosquev.png",
                iconSize: [50, 50],
                iconAnchor: [25, 50],
                popupAnchor: [-3, -76],
            });
		    var marker = L.marker([mosques[mosque].lat, mosques[mosque].lon],{ icon: myIcon }).addTo(macarte);
            marker.bindPopup(mosque);
	        }
        }
        window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
        };
    </script>
<style type="text/css">
    #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
        height:640px;
    }
</style> --}}
