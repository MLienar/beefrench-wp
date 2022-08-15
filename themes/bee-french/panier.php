<?php

/**
 * Template Name: Panier
 */

get_header();

?>
<main>
    <section class="wrap_panier">

        <form action="/pay" method="post" class="form_pay" name="form_pay" id="vrai_panier">
            <input type="hidden" name="id_product" class="id_product">
            <div>
                <h2 class="title_panier">Votre Panier</h2>
            </div>
            <div class="cd_end_basket">


                <div class="form-group cd_button_pay">
                    <div class="cd_prix_total">
                        <p>Prix Total : </p>
                        <p class="prix_total"></p>
                    </div>
                    <input type="submit" value="Payer" class="btn_payer" id="checkout-button">
                    <p id="error"></p>
                </div>

            </div>
        </form>
    </section>
</main>