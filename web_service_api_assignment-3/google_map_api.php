<?php
/* 12.GoogleMaps Geocoding API


*/



$apiKey = "YOUR_GOOGLE_MAPS_API_KEY"; // Add your Google API key

 
    
$lat = $lng = "";
$error = "";

if (isset($_GET['address'])) {
    $address = urlencode($_GET['address']);

    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data['status'] == "OK") {
        $lat = $data['results'][0]['geometry']['location']['lat'];
        $lng = $data['results'][0]['geometry']['location']['lng'];
    } else {
        $error = "Location not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Location Finder</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width: 450px; margin: 40px auto; background:#fff; padding:20px; border-radius:5px; }
        input, button { width:100%; padding:8px; margin-top:10px; }
        #map { height: 300px; margin-top:15px; }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>

<div class="container">
    <h2>📍 Location Finder</h2>

    <form method="get">
        <input type="text" name="address" placeholder="Enter address or city" required>
        <button type="submit">Find Location</button>
    </form>

    <?php if ($error) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <?php if ($lat && $lng) { ?>
        <p><b>Latitude:</b> <?php echo $lat; ?></p>
        <p><b>Longitude:</b> <?php echo $lng; ?></p>

        <div id="map"></div>

        <script>
            function initMap() {
                var location = { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> };
                var map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: location
                });
                new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        </script>

        <script async
            src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiKey; ?>&callback=initMap">
        </script>
    <?php } ?>
</div>

</body>
</html>






