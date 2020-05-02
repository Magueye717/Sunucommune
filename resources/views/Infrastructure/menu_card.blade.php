
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="contact-info-map mt-20 rmt-100 mb-10 rmb-90">
    <div class="container">
        <div class="contact-info-map-inner bg-white br-10">
            <div class="row ">
                <div class="col-lg-3">
                    <div class="contact-info pl-10 pr-20 pt-40 pb-30">
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



    <!-- Fichiers Javascript -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type="text/javascript">
        // On initialise la latitude et la longitude de Paris (centre de la carte)
        var lat = 14.4350715;
        var lon = -16.7925748;
        var macarte = null;
        var points = {
            "Marches Sandiara": { "lat": 14.435386744583505, "lon": -16.79157257080078 },
            "Stade sandiara": { "lat": 14.432664516479022, "lon": -16.79682970046997 },
            "Mosque Sandiara": { "lat": 14.436488094586286, "lon": -16.792924404144287 },
            "Station EDK Sandiara": { "lat": 14.435740008385615, "lon": -16.80006980895996 },
            "Pharmacie Ya Latif": { "lat": 14.435023090083915, "lon": -16.792398691177368 },
            "IMCEC Sandiara": { "lat": 14.434420461319409, "lon": -16.792806386947632 },
            "Habilo Magasin": { "lat": 14.434763336506181, "lon": -16.791014671325684 },
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
        }
        window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
        };
    </script>
<style type="text/css">
    #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
        height:800px;
    }
</style>
