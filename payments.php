<?php
require_once 'stripe-php-15.11.0-beta.1/init.php';
$key = getenv('STRIPE_PRUEBA');
$stripe = new \Stripe\StripeClient($key);

session_start();
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$hackathonCtf = $_POST['hackathonCtf'];
$teamName = $_POST['teamName'];
$teamMemberNum = $_POST['teamMemberNum'];
$country = $_POST['country'];

$_SESSION['formData'] = [
    'name' => $name,
    'lastname' => $lastname,
    'username' => $username,
    'email' => $email,
    'hackathonCtf' => $hackathonCtf,
    'teamName' => $teamName,
    'teamMemberNum' => $teamMemberNum,
    'country' => $country
];

try {
    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Registro CTF',
                ],
                'unit_amount' => 2500,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost:8000/register.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'http://localhost:8000/cancel.html',
    ]);

    header("Location: $checkout_session->url");
    exit();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}


?>
