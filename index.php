<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toegangscode - Kerst met Kaart</title>
    <!-- Stijlen -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>
<body>
<div class="container">
    <h2>Voer je kersttoegangscode in</h2>
    <form action="verify.php" method="post">
        <input type="text" name="code" required placeholder="Toegangscode">
        <button type="submit">Verzenden</button>
    </form>
    <footer>
        🎄 Prettige kerstdagen gewenst! 🎁
    </footer>
</div>

<!-- Minimale kaart -->
<div id="map" style="width: 100%; height: 300px; margin-top: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.3);"></div>

<!-- Scripts -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Controleer of Leaflet correct is geladen
        if (typeof L === "undefined") {
            console.error("Leaflet.js is niet geladen. Controleer de CDN-link.");
            return;
        }

        // Initialiseer de kaart
        const map = L.map('map').setView([52.3676, 4.9041], 13); // Amsterdam als standaardlocatie

        // Voeg een OpenStreetMap-laag toe
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Geolocatie ophalen
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                // Verplaats de kaart naar de huidige locatie
                map.setView([userLat, userLng], 15);

                // Voeg een marker toe op de huidige locatie
                L.marker([userLat, userLng]).addTo(map)
                    .bindPopup('Je bent hier!').openPopup();
            }, function() {
                console.warn('Geolocatie niet beschikbaar. Standaardlocatie wordt weergegeven.');
            });
        } else {
            console.warn('Geolocatie wordt niet ondersteund door deze browser.');
        }
    });
</script>
</body>
</html>
