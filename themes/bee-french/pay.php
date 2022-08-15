<?php

/**
 * Template Name: Pay
 */

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LN3pjIHDK7tuN34bMwilSdLCssg4fRq5koDGAVfCa4kzoArnFXOdoOt7LR7FtxY0uL7COpaGdHzMNbPzoXTQvg700dtKsUGFR');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://beefrench.local';

$quantity = $_POST['quantity'];
$id_product = $_POST['id_product'];
$prix = get_post_meta($id_product, 'prix', true);
$prix = $prix * 100;
$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price_data' => [
      'product_data' => [
        'name' => "Air Force 1",
      ] ,
      'unit_amount' => $prix,
      'currency' => 'eur'       
    ],
    'quantity' => $quantity,
  ]],
  'mode' => 'payment',

  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);?>
<?php get_footer() ?>