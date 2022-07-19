<?php get_header(); ?>
<main>
    <section class="hero">
        <article>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/af1.png" alt="AF1 Custom">
            <h1 class="custom_title">
                    <div data-scroll data-scroll-speed="6">C</div>
                    <div data-scroll data-scroll-speed="5">U</div>
                    <div data-scroll data-scroll-speed="4">S</div>
                    <div data-scroll data-scroll-speed="3">T</div>
                    <div data-scroll data-scroll-speed="2">O</div>
                    <div data-scroll data-scroll-speed="1" class="last_letter">M</div>
            </h1>
            <h1 class="af1_title">
                    <div data-scroll data-scroll-speed="1">A</div>
                    <div data-scroll data-scroll-speed="2">F</div>
                    <div data-scroll data-scroll-speed="3">1</div>
            </h1>
            <img class="hero_img img1" src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom1.jpeg"
                alt="AF1 Custom">
            <img class="hero_img img2"
                src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/0b8db10977f4379a889a557055f992bf.png"
                alt="AF1 Custom">
            <img class="hero_img img3" src="<?php echo get_template_directory_uri(); ?>/code/images/png/custom5.png"
                alt="AF1 Custom">
            <img class="hero_img img4" src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg"
                alt="AF1 Custom">
            <!--<p>Lorem, ipsum dolor sit amet consectetur adipisicing </p>-->
        </article>
        <aside>
            <p>Nos Créations</p>
            <a href="#cd_contenu_index">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                </svg>
            </a>
        </aside>
    </section>
    <section id="cd_contenu_index">
        <div class="contenu_index_1" data-scroll>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom1.jpeg" alt="AF1 Custom"
                data-scroll data-scroll-speed="2">
            <div class="sous_div_contenu_1">
                <h3>Paires custom
                    réalisées à la main en France</h3>
                <p>Toutes nos paires
                    sont customisées par nos soins dans les Yvelines</p>
            </div>
        </div>
        <div class="contenu_index_2">
            <div class="sous_div_contenu_2">
                <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/custom5.png" alt="AF1 Custom"
                    class="image_index_21" data-scroll data-scroll-speed="2">
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/0b8db10977f4379a889a557055f992bf.png"
                alt="AF1 Custom" class="image_index_22">
        </div>
        <div class="contenu_index_3">
            <div class="sous_div_contenu_3">
                <h3>modèle au choix</h3>
                <p>Choisissez le modèle d’air force 1 que vous
                    préférez, nous prendrons soin de le personnaliser
                    selon vos envies</p>
            </div>
            <div class="sous_div_contenu_3_bis">
                <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" data-scroll
                    data-scroll-speed="2">
            </div>
        </div>
        <div class="contenu_index_4">
            <div class="sous_div_contenu_4">
                <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/custom5.png" alt="AF1 Custom">
                <h3>COLLECTION CHAUSSURES</h3>
            </div>
            <div class="sous_div_contenu_4_bis">
                <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/custom5.png" alt="AF1 Custom">
                <h3>COLLECTION VETEMENTS</h3>
            </div>
        </div>
        <div class="contenu_index_5">
            <div class="sous_div_contenu_5">
                <!-- Pas fan de cette animation avec les deux trucs séparés au début -->
                <h3>vous avez une idée précise en
                    tête ?</h3>
                <p>Décrivez nous la paire de vos
                    rêves en détails et nous vous ferons une proposition de design
                    parfaitement adaptée à vos besoins</p>
                <button>CREATION SUR MESURE</button>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" alt="AF1 Custom">
        </div>
    </section>
</main>
<?php get_footer(); ?>
