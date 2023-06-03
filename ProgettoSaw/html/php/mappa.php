<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Mappa</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/mappa.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
    
    <!-- leaflet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
    <section>
        <h1>GoGreen Car Sharing</h1>
        <h2>Mappa delle Auto Disponibili</h2>
        <div id="map"></div>
    </section>
    <aside>
        <h3> Accedi alla tua posizione sulla mappa: </h3>
        <button id="myLocationButton" onclick="buttonClick('myLocationButton');">La mia posizione</button>
        <h4 id="ripristina" onclick="refresh()"> Torna sulle auto </a></h4>
        <div> 
            <h2> Auto disponibili nella tua zona </h2>
            <div id="puntiInteresseDiv"></div>
        </div>
        <script>
            function refresh() {
                    location.reload();
            }
            var puntiInteresse = [
            {
                nome: 'Piazza Dante',
                modello: 'Rangerover Eco-Explorer',
                latitudine: 44.4048,
                longitudine: 8.9348
            },
            {
                nome: 'Via Dodecaneso',
                modello: 'BMW Eco-Cruiser',
                latitudine: 44.4020,
                longitudine: 8.9673
            },
            {
                nome: 'Piazza della Vittoria',
                modello: 'BMW Eco-SUV',
                latitudine: 44.4028,
                longitudine: 8.9429
            },
            {
                nome: 'Corso Gastaldi',
                modello: 'BMW Eco-SUV',
                latitudine: 44.4046,
                longitudine: 8.9599
            },
            {
                nome: 'Corso Firenze',
                modello: 'BMW Eco-Cruiser',
                latitudine: 44.4174,
                longitudine: 8.9336
            },
            {
                nome: 'Piazza Martinez',
                modello: 'Tesla Eco-Rocket',
                latitudine: 44.4071,
                longitudine: 8.9566
            },
            {
                nome: 'Piazza Leonardo Da Vinci',
                modello: 'BMW Eco-Cruiser',
                latitudine: 44.3977,
                longitudine: 8.9649
            },
            {
                nome: 'Via Antonio Cantore',
                modello: 'Rangerover Eco-Explorer',
                latitudine: 44.4111,
                longitudine: 8.8959
            },
            ];

            var divPuntiInteresse = document.getElementById('puntiInteresseDiv');
            divPuntiInteresse.innerHTML = '';

            var map = L.map('map').setView([44.4046, 8.9335], 14);

             L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                subdomains:['mt0','mt1','mt2','mt3'],
                maxZoom: 18
            }).addTo(map);

            for (var i = 0; i < puntiInteresse.length; i++) {
                var marker = L.marker([puntiInteresse[i].latitudine, puntiInteresse[i].longitudine]).addTo(map); 
                marker.bindPopup(puntiInteresse[i].nome);
            }

            function setMapViewport(latitudine, longitudine) {
                map.setView([latitudine, longitudine], 16);
                }

            for (var i = 0; i < puntiInteresse.length; i++) {
                var puntoInteresse = puntiInteresse[i];
                var nome = puntoInteresse.nome;
                var latitudine = puntoInteresse.latitudine;
                var longitudine = puntoInteresse.longitudine;

                var puntoInteresseElement = document.createElement('button');
                var id = 'disponibile-' + i; // Genera un ID univoco
                puntoInteresseElement.id = id;
                puntoInteresseElement.className = 'disponibile';
                puntoInteresseElement.innerHTML = '<b>' + nome + '</b><br>' + puntoInteresse.modello;
                
                // Aggiungi la funzione onclick per impostare la vista della mappa
                puntoInteresseElement.onclick = function(lat, lng, id) { 
                    return function() {
                        setMapViewport(lat, lng);
                        buttonClick(id);
                    };     
                }(latitudine, longitudine, puntoInteresseElement.id);
                
                divPuntiInteresse.appendChild(puntoInteresseElement);
            }

            var circle;
            var latitude;
            var longitude;

            function ottieniPosizione() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                    var accuracy = position.coords.accuracy;

                    if (circle) {
                        map.removeLayer(circle);
                    }

                    circle = L.circle([latitude, longitude], {
                        color: '#3787FF',
                        fillColor: '#3787FF',
                        fillOpacity: 0.3,
                        radius: 100
                    }).addTo(map);

                }, function (error) {
                    console.error("Errore durante l'ottenimento della posizione: " + error.message);
                });
            } else {
                console.error("La geolocalizzazione non è supportata dal tuo browser.");
            }
            }
            ottieniPosizione();

            document.getElementById('myLocationButton').addEventListener('click', function () {
                ottieniPosizione();
                map.setView([latitude, longitude], 16);
            });
        </script>
    </aside>
    <?php include '../components/footer.html'; ?>
</body>
</html>