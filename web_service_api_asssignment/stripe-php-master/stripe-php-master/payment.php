<?php
header("Content-Type: application/json");

// Stripe SDK include (NO composer)
require 'init.php';


\Stripe\Stripe::setApiKey("sk_test_YOUR_SECRET_KEY");

// JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['amount'])) {
    echo json_encode(["error" => "Amount required"]);
    exit;
}

try {
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $data['amount'] * 100,
        'currency' => 'inr',
        'payment_method_types' => ['card'],
    ]);

    echo json_encode([
        "status" => "success",
        "clientSecret" => $paymentIntent->client_secret
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
