<?php

//email send via sendgride 

    $apiKey = "";// api key
   
    $emailData = [
    "personalizations" => [[
        "to" => [[ "email" => "mathakiyainzamul3@gmail.com" ]],
        "subject" => "Demo Email from Pure PHP using SendGrid API"
    ]],
    "from" => [ "email" => "mathakiyainzamul43@gmail.com" ],
    "content" => [[
        "type" => "text/plain",
        "value" => "Hello Students! This is a demo email sent using SendGrid via raw PHP cURL ."
    ]]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($error) {
    echo "Error: $error";
} else {
    echo "Email Sent Successfully!<br>Status Code: $httpCode";
    echo "<pre>$response</pre>";
}



?>