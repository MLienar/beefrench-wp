<?php
get_header();
$sexe = get_terms(['taxonomy' => 'Sexe']);
?>

<main>
    <?php if (have_posts()) : the_post(); ?>
        <section class="fil_arianne">
            <div class="back_arianne">
                <a href="<?= get_site_url('produits', '/produits'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    <p>BACK</p>
                </a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= get_home_url(); ?>"> Home </a></li>
                    <li> / </li>
                    <li class="breadcrumb-item"><a href="<?= get_site_url('produits', '/produits'); ?>"> Shoes </a></li>
                    <li> / </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?php the_title(); ?> </li>
                </ol>
            </nav>
        </section>
        <section class="wrap_grille_img">
            <?php
            $arr = (get_post_meta($post->ID, 'vdw_gallery_id', true));
            ?>
            <section class="gallery">
                <img class="gallery__big" src="<?= wp_get_attachment_url($arr[0]) ?>" alt="" />
                <div class="gallery__cd">
                    <img class="gallery__cd__img" src="<?= wp_get_attachment_url($arr[0]) ?>" alt="" />
                    <img class="gallery__cd__img" src="<?= wp_get_attachment_url($arr[1]) ?>" alt="" />
                    <img class="gallery__cd__img" src="<?= wp_get_attachment_url($arr[2]) ?>" alt="" />
                    <img class="gallery__cd__img" src="<?= wp_get_attachment_url($arr[3]) ?>" alt="" />
                </div>
            </section>
            <div class="cd_form_fiche_produit">
                <p class="postid id<?= $post->ID; ?>"><?= $post->ID; ?></p>
                <h2 class="nom<?= $post->ID; ?>"><?php the_title(); ?></h2>
                <div class="info_fiche_produit">
                    <p class="sexe"><?php echo (get_post_meta($post->ID, 'sexe', true)); ?></p>
                    <p class="prix<?= $post->ID; ?>"><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                </div>
                <p>TAILLES DISPONIBLES</p>
                <form action="#">
                    <div class="taille_check">

                    </div>
                    <div class="cd_form_button">
                        <label for="taille">QTE</label>
                        <select name="taille" id="taille">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="button" class="ajouter <?= $post->ID; ?>">
                            <p class="p_button">Ajouter au panier</p>
                            <i class="bi bi-cart2 basket_icon"></i>
                            <img src="<?php echo get_template_directory_uri(); ?>/code/images/png/icons8-baskets-64.png" alt="sneakers" class="sneakers_basket">
                            <i class="bi bi-check2 addtocart"></i>
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <section class="cd_commentaire">
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        </section>
    <?php else : ?>
    <?php endif;
    wp_reset_query(); ?>
    <?php
    $sneakers = new WP_Query([
        'post_type' => 'sneakers',
        'posts_per_page' => 3,
        'orderby' => 'rand',
    ]);
    ?>
    <section class="wrap_all_produit">
        <div class="wrap_cd_produit">
            <?php 
            while ($sneakers->have_posts()) : $sneakers->the_post();
            $arr = (get_post_meta($post->ID, 'vdw_gallery_id', true));
            ?>
                <div class="cd_produit">
                <img src="<?= wp_get_attachment_url($arr[0]) ?>" class="img_produit">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    <div class="overlay_produit_1">
                        <img src="<?= wp_get_attachment_url($arr[1]) ?>" alt="imgae sneakers survol">
                    </div>
                    <div class="overlay_produit_2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
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