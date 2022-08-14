<?php
include_once('Stripe/init.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
Stripe\Stripe::setApiKey("#pk_test_51LN3pjIHDK7tuN34yuWA75fiVVDjcwgStR76mRzc6GWRDXdVPC7JePrJ2QpJu9O7hJGtzOWamS6dvUvgIhz1k9wb00decLWXbb");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
    'amount' => 100, //1EURO
    'currency' => 'eur',
    'description' => 'Test charge',
    'source' => $token,
]);
var_dump($charge);
?>