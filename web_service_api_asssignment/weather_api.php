<?php
// =====================
// OpenWeatherMap API
// =====================
$apiKey = "";   // <-- add your API key here
$units  = "metric";
$city   = "";
$data   = null;

if (isset($_GET['city'])) {
    $city = $_GET['city'];

    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units={$units}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
</head>
<body>

<h2>Weather App (API Integration in PHP)</h2>

<form method="get">
    <input type="text" name="city" placeholder="Enter city name" required>
    <button type="submit">Get Weather</button>
</form>

<hr>

<?php if ($data && $data['cod'] == 200) { ?>
    <h3>Weather in <?php echo htmlspecialchars($city); ?></h3>
    <p><b>Temperature:</b> <?php echo $data['main']['temp']; ?> °C</p>
    <p><b>Condition:</b> <?php echo ucfirst($data['weather'][0]['description']); ?></p>
    <p><b>Humidity:</b> <?php echo $data['main']['humidity']; ?>%</p>
    <p><b>Wind Speed:</b> <?php echo $data['wind']['speed']; ?> m/s</p>

<?php } elseif ($data) { ?>
    <p style="color:red;">City not found or API error!</p>
<?php } ?>

</body>
</html>
