<?php

/**
 * Template Name: Page Produits 
 */

get_header() ?>


<main>
    <section class="wrap_all_produit">
        <div class="pres_produit">
            <div class="txt_prod">
                <h3 data-aos="fade-right" data-aos-easing="ease-out-cubic">COLLECTIONS CUSTOMS</h3>
                <p data-aos="fade-left" data-aos-delay="100" data-aos-easing="ease-out-cubic">Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Fuga veniam pariatur a, iste, id
                    tempore, molestiae corrupti ad repellendus cumque nesciunt eius mollitia consectetur
                    perspiciatis. Itaque adipisci officiis inventore odit.</p>
            </div>
            <?= get_search_form(); ?>
        </div>
        <div class="wrap_cd_produit">
            <?php while (have_posts()) : the_post(); ?>
                <div class="cd_produit">
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img_produit', 'alt' => 'AF1 Custom', 'data-aos' => 'fade-up', 'data-aos-easing' => 'ease-out-cubic']) ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/af1.png" alt="AF1 CUSTOM" data-aos="fade-up" data-aos-easing="ease-out-cubic" class="img_produit">
                    <h3 data-aos="fade-right" data-aos-delay="100" data-aos-easing="ease-out-cubic"><?php the_title(); ?></h3>
                    <?php the_excerpt() . "€"; ?>
                    <div class="overlay_produit_1">
                        <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" alt="AF1 Custom">
                    </div>
                    <div class="overlay_produit_2">
                        <a href="#"><?php the_title(); ?></a>
                        <p><?php the_excerpt() . "€"; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section id="cd_contenu_index">
        <div class="contenu_index_5">
            <div class="sous_div_contenu_5" data-aos="fade-up-right" data-aos-easing="ease-out-cubic">
                <h3 data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-delay="150">vous avez une
                    idée précise en
                    tête ?</h3>
                <p data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-delay="200">Décrivez nous la
                    paire de vos
                    rêves en détails et nous vous ferons une proposition de design
                    parfaitement adaptée à vos besoins</p>
                <button data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-delay="250">CREATION SUR
                    MESURE</button>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" alt="AF1 Custom" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-delay="100">
        </div>
    </section>


</main>

<?php get_footer() ?>