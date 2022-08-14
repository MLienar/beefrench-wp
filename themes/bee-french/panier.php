<?php

/**
 * Template Name: Panier
 */

get_header();

?>
<main>
    <section class="wrap_panier">

        <section id="vrai_panier">
            <div>
                <h2 class="title_panier">Votre Panier</h2>
            </div>
            <div class="cd_end_basket">
                <form action="pay.php" method="post" class="form_pay">
                    <div class="form-group">
                        <label for="inputNom">Nom Complet</label>
                        <input type="text" class="form-control inputName" id="inputNom" value="Enzo Givernaud">
                    </div>
                    <div class="form-group">
                        <label for="inputAdresse">Adresse de Livraison</label>
                        <input type="text" class="form-control inputAdresse" id="inputAdresse" value="237 avenue de la Division Leclerc">
                    </div>
                    <div class="form-row">
                        <div class="form-group cc">
                            <label for="inputVille">Ville</label>
                            <input type="text" class="form-control inputVille" id="inputVille" value="Chatenay-Malabry">
                        </div>
                        <div class="form-group cc">
                            <label for="inputCodePostal">Code Postal</label>
                            <input type="text" class="form-control inputCodePostal" id="inputCodePostal" value="92290">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="credit-number">Numéro Carte de Crédit</label>
                        <input name="credit-number" class="cc-number form-control" type="tel" maxlength="19" placeholder="Card Number" value="4242 4242 4242 4242">
                    </div>
                    <div class="form-row">
                        <div class="form-group cc">
                            <label for="credit-expires">Date d'expiration</label>
                            <input name="credit-expires" class="cc-expires form-control" type="tel" maxlength="7" placeholder="MM / YY" value="10 / 23">
                        </div>
                        <div class="form-group cc">
                            <label for="credit-cvc">CVC</label>
                            <input name="credit-cvc" class="cc-cvc form-control" type="tel" pattern="\d*" maxlength="3" placeholder="CVC" value="123">
                        </div>
                    </div>
                    <div class="form-group cd_button_pay">
                        <div class="cd_prix_total">
                            <p>Prix Total : </p>
                            <p class="prix_total"></p>
                        </div>
                        <input type="submit" value="Payer" class="btn_payer" id="checkout-button">
                        <p id="error"></p>
                    </div>
                </form>
            </div>
        </section>
    </section>
</main>
<?php get_footer() ?>