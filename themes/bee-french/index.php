<?php

/**
 * Template Name: Page Shoes
 */

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https";
} else {
    $url = "http";
}
$url .= "://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
$urlname = explode("/", $url);
$urlpost = $urlname[3];
$_name = "";
if (isset($_GET['s'])) {
    $_name = $_GET['s'];
}

if ($urlpost === 'apparel') {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'apparel',
        's'             =>  $_name,
        'posts_per_page' => 9,
        'rubrique'    => 'custom',
        'paged' => $paged
    );
    query_posts($args);
} else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'sneakers',
        's'             =>  $_name,
        'posts_per_page' => 9,
        'rubrique'    => 'custom',
        'paged' => $paged
    );
    query_posts($args);
}
$num = count(get_posts($args));

get_header();

?>
<main>
    <section class="wrap_all_produit">
        <div class="pres_produit">
            <div class="txt_prod">
                <h3>COLLECTIONS CUSTOMS</h3>
                <p>Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Fuga veniam pariatur a, iste, id
                    tempore, molestiae corrupti ad repellendus cumque nesciunt eius mollitia consectetur
                    perspiciatis. Itaque adipisci officiis inventore odit.</p>
            </div>
            <?php get_template_part('sneakers', 'searchform'); ?>
        </div>
        <h1><?= $num !== 0 ? 'Custom' : '' ?><?= $num > 1 ? 's' : '' ?></h1>
        <div class="wrap_cd_produit">

            <?php
            while (have_posts()) : the_post();
                $arr = (get_post_meta($post->ID, 'vdw_gallery_id', true));
                $th = $arr[0];
                $survol = $arr[1];
            ?>  
                <div class="cd_produit">
                    <img src="<?= wp_get_attachment_url($th) ?>" class="img_produit">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    <div class="overlay_produit_1">
                        <img src="<?= wp_get_attachment_url($survol) ?>" alt="imgae sneakers survol">
                    </div>
                    <div class="overlay_produit_2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <?php the_posts_pagination(); ?>
        <?php
        wp_reset_query();
        if ($urlpost === 'apparel') {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'apparel',
                's'             =>  $_name,
                'posts_per_page' => 9,
                'rubrique'    => 'commande',
                'paged' => $paged
            );
            query_posts($args);
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'sneakers',
                's'             =>  $_name,
                'posts_per_page' => 9,
                'rubrique'    => 'commande',
                'paged' => $paged
            );
            query_posts($args);
        }
        $num = count(get_posts($args));
        ?>
        <h1><?= $num !== 0 ? 'Commande' : '' ?><?= $num > 1 ? 's' : '' ?></h1>
        <div class="wrap_cd_produit">
            <?php
            while (have_posts()) : the_post();
                $arr = (get_post_meta($post->ID, 'vdw_gallery_id', true));
                $th = $arr[0];
                $survol = $arr[1];
            ?>
                <div class="cd_produit">
                    <img src="<?= wp_get_attachment_url($th) ?>" class="img_produit">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    <div class="overlay_produit_1">
                        <img src="<?= wp_get_attachment_url($survol) ?>" alt="imgae sneakers survol">
                    </div>
                    <div class="overlay_produit_2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <?php the_posts_pagination(); ?>
    </section>
    <section id="cd_contenu_index">
        <div class="contenu_index_5">
            <div class="sous_div_contenu_5">
                <h3>vous avez une
                    idée précise en
                    tête ?</h3>
                <p>Décrivez nous la
                    paire de vos
                    rêves en détails et nous vous ferons une proposition de design
                    parfaitement adaptée à vos besoins</p>
                <button>CREATION SUR
                    MESURE</button>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" alt="AF1 Custom">
        </div>
    </section>

</main>

<?php get_footer() ?>