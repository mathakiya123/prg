<?php
// send message in number


$account_sid = "AC324a3b0fea4a96155260dc1e7fee4b8d";
$auth_token  = "9a51250129f4417af3c7977344e6b767";
$twilio_number = "+13412214433"; // Your Twilio toll-free number
$to = "+91 8238489638";

$data = http_build_query([
    "From" => $twilio_number,
    "To"   => $to,
    "Body" => "Hello! This is demo SMS using Twilio REST API and pure PHP."
]);

$url = "https://api.twilio.com/2010-04-01/Accounts/$account_sid/Messages.json";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$account_sid:$auth_token");

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "Error: $error";
} else {
    echo "SMS Sent Successfully!<br>";
    echo "<pre>$response</pre>";
}
?>