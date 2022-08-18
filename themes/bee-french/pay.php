<?php

/**
 * Template Name: Pay
 */

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LN3pjIHDK7tuN34bMwilSdLCssg4fRq5koDGAVfCa4kzoArnFXOdoOt7LR7FtxY0uL7COpaGdHzMNbPzoXTQvg700dtKsUGFR');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://beefrench.local';

$nom = $_POST['nom_produit'];
$image = $_POST['image'];
$quantity = $_POST['quantity'];
$tab_id_product = [];
$id_product = $_POST['id_product'];
$prix = get_post_meta($id_product, 'prix', true);
$prix = $prix * 100;
$i = 0;
foreach ($id_product as $ligne) {
  $tab_id_product[$i]['id'] = $ligne;
  $i = $i + 1;
}
$i = 0;
foreach ($quantity as $ligne) {
  $tab_id_product[$i]['quantity'] = $ligne;
  $i = $i + 1;
}
$i = 0;
foreach ($nom as $ligne) {
  $tab_id_product[$i]['nom'] = $ligne;
  $i = $i + 1;
}
$i = 0;
foreach ($image as $ligne) {
  $tab_id_product[$i]['image'] = $ligne;
  $i = $i + 1;
}
foreach ($tab_id_product as $product) {
  $line_items_array[] = array(
      'price_data' => array(
          'currency' => 'eur',
          'unit_amount' => intval(get_post_meta(substr($product['id'], 0, -2), 'prix', true)) * 100,
          'product_data' => array(
              'name' => $product['nom'],
          ),
      ),
      'quantity' => $product['quantity'],
  );
}
$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => $line_items_array,
  'mode' => 'payment',

  'success_url' => get_permalink().'/redirect_sucess',
  'cancel_url' => get_permalink().'/redirect_echec',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>
