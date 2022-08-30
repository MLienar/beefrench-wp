<?php

function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En-tête du menu');
}

function montheme_register_assets()
{

    wp_register_style('style', get_stylesheet_directory_uri() . '/code/public/css/style.css');
    wp_register_style('locomotivecss', get_stylesheet_directory_uri() . '/code/public/css/locomotive-scroll.css');
    wp_register_style('boostrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
    wp_register_script('locomotivejs', get_stylesheet_directory_uri() . '/code/js/locomotive-scroll.min.js');
    wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js');
    wp_register_script('basket', get_stylesheet_directory_uri() . '/code/js/basket.js');
    wp_register_script('index', get_stylesheet_directory_uri() . '/code/js/main.js');
    wp_register_script('frontpage', get_stylesheet_directory_uri() . '/code/js/front-page.js');
    wp_register_script('afficher_panier', get_stylesheet_directory_uri() . '/code/js/afficher_panier.js');
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js');
    wp_register_script('jquery_paiement', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.0.1/jquery.payment.min.js');
    wp_register_script('stripe', 'https://js.stripe.com/v3/');
    wp_enqueue_style('boostrap');
    wp_enqueue_script('stripe');
    wp_enqueue_style('style');
    wp_enqueue_script('jquery');
    wp_enqueue_script('gsap');
    wp_enqueue_script('index');
    if( is_front_page() ) {
        wp_enqueue_style('locomotivecss');
        wp_enqueue_script('locomotivejs');
    	wp_enqueue_script('frontpage');   
    }
    if ( is_page(176) ){
    	wp_enqueue_script('afficher_panier');
        wp_enqueue_script('jquery_paiement');
        
    }
    if ( is_single() && 'sneakers' == get_post_type() ) {
    	wp_enqueue_script('basket');
    }
    if ( is_single() && 'apparel' == get_post_type() ) {
    	wp_enqueue_script('basket');
    }
}

function montheme_title_separator()
{
    return '|';
}

function montheme_document_title_parts($title)
{
    unset($title['tagline']);
    return $title;
}


function montheme_types()
{
    register_post_type('Sneakers', [
        'label' => 'Sneakers',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => get_template_directory_uri() . '/code/images/png/af1_logo.png',
        'supports' => ['title', 'thumbnail', 'comments'],
        'show_in_rest' => true,
        'has_archive' => true,
        ''
    ]);
    register_post_type('Apparel', [
        'label' => 'Apparel',
        'public' => true,
        'menu_position' => 2,
        'menu_icon' => get_template_directory_uri() . '/code/images/png/t-shirt-24.png',
        'supports' => ['title', 'thumbnail', 'comments'],
        'show_in_rest' => true,
        'has_archive' => true,
        ''
    ]);
}


add_action('init', 'montheme_types');

add_action('init', 'montheme_types');

add_action('wp_enqueue_scripts', 'montheme_register_assets');

add_action('after_setup_theme', 'montheme_supports');

add_filter('document_title_separator', 'montheme_title_separator');

add_filter('document_title_parts', 'montheme_document_title_parts');


add_filter('kdmfi_featured_images', function ($featured_images) {
    $args = array(
        'id' => 'image-Survol',
        'label_name' => 'Image Survol',
        'label_set' => 'Set Image Survol',
        'label_use' => 'Set Image Survol',
        'post_type' => array('Sneakers', 'Apparel'),
    );

    $featured_images[] = $args;

    return $featured_images;
});

add_filter('kdmfi_featured_images', function ($featured_images) {
    $args = array(
        'id' => 'image-sneakers-1',
        'label_name' => 'Image Sneakers 1',
        'label_set' => 'Set Image Sneakers 1',
        'label_use' => 'Set Image Sneakers 1',
        'post_type' => array('Sneakers', 'Apparel'),
    );

    $featured_images[] = $args;

    return $featured_images;
});

add_filter('kdmfi_featured_images', function ($featured_images) {
    $args = array(
        'id' => 'image-sneakers-2',
        'label_name' => 'Image Sneakers 2',
        'label_set' => 'Set Image Sneakers 2',
        'label_use' => 'Set Image Sneakers 2',
        'post_type' => array('Sneakers', 'Apparel'),
    );

    $featured_images[] = $args;

    return $featured_images;
});

add_filter('kdmfi_featured_images', function ($featured_images) {
    $args = array(
        'id' => 'image-sneakers-3',
        'label_name' => 'Image Sneakers 3',
        'label_set' => 'Set Image Sneakers 3',
        'label_use' => 'Set Image Sneakers 3',
        'post_type' => array('Sneakers', 'Apparel'),
    );

    $featured_images[] = $args;

    return $featured_images;
});

add_filter('kdmfi_featured_images', function ($featured_images) {
    $args = array(
        'id' => 'image-sneakers-4',
        'label_name' => 'Image Sneakers 4',
        'label_set' => 'Set Image Sneakers 4',
        'label_use' => 'Set Image Sneakers 4',
        'post_type' => array('Sneakers', 'Apparel'),
    );

    $featured_images[] = $args;

    return $featured_images;
});


add_filter('manage_sneakers_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => "Image Vitrine 1",
        'title' => $columns['title'],
        'date' => $columns['date']
    ];
});


add_filter('manage_sneakers_posts_custom_column', function ($column, $postId) {
    if ($column === 'thumbnail') {
        the_post_thumbnail('medium', $postID);
    }
}, 10, 2);

add_filter('manage_apparel_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => "Image Vitrine 1",
        'title' => $columns['title'],
        'date' => $columns['date']
    ];
});


add_filter('manage_apparel_posts_custom_column', function ($column, $postId) {
    if ($column === 'thumbnail') {
        the_post_thumbnail('medium', $postID);
    }
}, 10, 2);


wp_enqueue_style('admin_montheme', get_stylesheet_directory_uri() . '/code/public/css/style.css');

wp_enqueue_script('admin_montheme', get_stylesheet_directory_uri() . '/code/js/custom_admin.js');






function save_metaboxes_reduction($post_ID)
{
    if (isset($_POST['reduction'])) {
        update_post_meta($post_ID, 'reduction', esc_html($_POST['reduction']));
    }
}

function save_metaboxes_prix($post_ID)
{
    if (isset($_POST['prix'])) {
        update_post_meta($post_ID, 'prix', esc_html($_POST['prix']));
    }
}

function save_metaboxes_sexe($post_ID)
{
    if (isset($_POST['sexe'])) {
        update_post_meta($post_ID, 'sexe', esc_html($_POST['sexe']));
    }
}

function metabox_mutiple_fields()
{

    add_meta_box(
        'diwp-metabox-multiple-fields',
        'Prix',
        'add_multiple_fields',
        array('sneakers', 'apparel')
    );
}
function montheme_register_rubrique() {
    register_taxonomy('rubrique', array('apparel', 'sneakers'), [
        'labels' => [
            'name' => 'rubrique',
            'singular_name'     => 'rubrique',
            'plural_name'       => 'rubriques',
            'search_items'      => 'Rechercher des rubriques',
            'all_items'         => 'Tous les rubriques',
            'edit_item'         => 'Editer la rubrique',
            'update_item'       => 'Mettre à jour la rubrique',
            'add_new_item'      => 'Ajouter une nouvelle rubrique',
            'new_item_name'     => 'Ajouter une nouvelle rubrique',
            'menu_name'         => 'rubrique',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'montheme_register_rubrique');
add_action('add_meta_boxes', 'metabox_mutiple_fields');
add_action('save_post', 'save_metaboxes_reduction');
add_action('save_post', 'save_metaboxes_prix');
add_action('save_post', 'save_metaboxes_sexe');

function add_multiple_fields($post)
{
    $reduc = get_post_meta($post->ID, 'reduction', true);
    $prix = get_post_meta($post->ID, 'prix', true);
    $sexe = get_post_meta($post->ID, 'sexe', true);
    if (isset($_POST['reduction'])) {
        update_post_meta($post_ID, 'reduction', esc_html($_POST['reduction']));
    }
    if (isset($_POST['sexe'])) {
        update_post_meta($post_ID, 'sexe', esc_html($_POST['sexe']));
    }
?>
<div class="cd_metaboxe">
    <div class="wrap_cd_radio_reduc">
        <div class="label">
            <h4>Réduction</h4>
        </div>
        <div class="cd_radio_reduc">
            <div>
                <input type="radio" value="0" name="reduction" <?php checked($reduc, '0') ?>>
                <label for="reduction">0%</label>
            </div>
            <div>
                <input type="radio" value="5" name="reduction" <?php checked($reduc, '5') ?>>
                <label for="reduction">5%</label>
            </div>
            <div>
                <input type="radio" value="10" name="reduction" <?php checked($reduc, '10') ?>>
                <label for="reduction">10%</label>
            </div>
            <div>
                <input type="radio" value="15" name="reduction" <?php checked($reduc, '15') ?>>
                <label for="reduction">15%</label>
            </div>
            <div>
                <input type="radio" value="20" name="reduction" <?php checked($reduc, '20') ?>>
                <label for="reduction">20%</label>
            </div>
            <div>
                <input type="radio" value="25" name="reduction" <?php checked($reduc, '25') ?>>
                <label for="reduction">25%</label>
            </div>
            <div>
                <input type="radio" value="30" name="reduction" <?php checked($reduc, '30') ?>>
                <label for="reduction">30%</label>
            </div>
            <div>
                <input type="radio" value="40" name="reduction" <?php checked($reduc, '40') ?>>
                <label for="reduction">40%</label>
            </div>
            <div>
                <input type="radio" value="45" name="reduction" <?php checked($reduc, '45') ?>>
                <label for="reduction">45%</label>
            </div>
            <div>
                <input type="radio" value="50" name="reduction" <?php checked($reduc, '50') ?>>
                <label for="reduction">50%</label>
            </div>
            <div>
                <input type="radio" value="60" name="reduction" <?php checked($reduc, '60') ?>>
                <label for="reduction">60%</label>
            </div>
            <div>
                <input type="radio" value="70" name="reduction" <?php checked($reduc, '70') ?>>
                <label for="reduction">70%</label>
            </div>
        </div>
    </div>

    <div class="wrap_cd_fields">
        <div class="label">
            <h4>Checkbox Fields</h4>
        </div>
        <div class="cd_number_fields">
            <label for="prix">Prix</label>
            <input id="prix" type="number" name="prix" required min="5" max="5000" value="<?= $prix ?>" />
        </div>
    </div>

    <div class="wrap_cd_fields">
        <div class="label">
            <h4>Sexe</h4>
        </div>
        <div class="cd_fields">
            <div>
                <label for="sexe">Homme</label>
                <input id="sexe" type="checkbox" name="sexe" value="homme" <?php checked($sexe, 'homme') ?> />
            </div>
            <div>
                <label for="sexe">Femme</label>
                <input id="sexe" type="checkbox" name="sexe" value="femme" <?php checked($sexe, 'femme') ?> />
            </div>
        </div>
    </div>
</div>
<?php
}
function search_sneakers($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if ($wp_query->is_search && $post_type == 'sneakers') {
        return locate_template('index.php');
    }
    return $template;
}
add_filter('template_include', 'search_sneakers');

function search_apparel($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if ($wp_query->is_search && $post_type == 'apparel') {
        return locate_template('apparel.php');
    }
    return $template;
}
add_filter('template_include', 'search_apparel');


