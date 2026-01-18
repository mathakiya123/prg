<?php
$apiKey = "";   // Add your OpenWeatherMap API key
$units  = "metric";
$weatherData = null;
$error = "";

if (isset($_GET['city'])) {
    $city = trim($_GET['city']);

    if ($city != "") {
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units={$units}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $weatherData = json_decode($response, true);

        if ($weatherData['cod'] != 200) {
            $error = "City not found!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Dashboard</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width: 400px; margin: 50px auto; background:#fff; padding:20px; border-radius:5px; }
        h2 { text-align:center; }
        input, button { width:100%; padding:8px; margin-top:10px; }
        .weather { margin-top:20px; background:#e9f5ff; padding:15px; border-radius:5px; }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>

<div class="container">
    <h2>🌤 Weather Dashboard</h2>

    <form method="get">
        <input type="text" name="city" placeholder="Enter city name" required>
        <button type="submit">Get Weather</button>
    </form>

    <?php if ($error) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <?php if ($weatherData && !$error) { ?>
        <div class="weather">
            <h3><?php echo $weatherData['name']; ?></h3>
            <p><b>Temperature:</b> <?php echo $weatherData['main']['temp']; ?> °C</p>
            <p><b>Weather:</b> <?php echo ucfirst($weatherData['weather'][0]['description']); ?></p>
            <p><b>Humidity:</b> <?php echo $weatherData['main']['humidity']; ?>%</p>
            <p><b>Wind Speed:</b> <?php echo $weatherData['wind']['speed']; ?> m/s</p>
        </div>
    <?php } ?>
</div>

</body>
</html>
