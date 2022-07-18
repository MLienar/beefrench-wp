<?php

/**
 * Template Name: Apparel Page
 */

$_name = $_GET['s'];

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 $args=array(
 'post_type' => 'apparel',
 's'             =>  $_name, 
'posts_per_page' => 9,
 'paged'=>$paged
 );
 query_posts($args);
?>


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
            <?php get_template_part( 'apparel', 'searchform' ); ?>
        </div>
        <div class="wrap_cd_produit">
        <?php while(have_posts()): the_post(); ?>
                <div class="cd_produit">
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img_produit', 'alt' => 'AF1 Custom', 'data-aos' => 'fade-up', 'data-aos-easing' => 'ease-out-cubic']) ?>
                    <h3 data-aos="fade-right" data-aos-delay="100" data-aos-easing="ease-out-cubic"><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta($post->ID,'prix',true) . "€"); ?></p>
                    <div class="overlay_produit_1">
                        <?php kdmfi_the_featured_image( 'image-Survol'); ?>
                    </div>
                    <div class="overlay_produit_2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo (get_post_meta($post->ID,'prix',true) . "€"); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            
        </div>
        <?php the_posts_pagination(); ?>
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