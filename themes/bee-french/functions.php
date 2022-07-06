<?php

function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu( 'header', 'En-tête du menu' );
}

function montheme_register_assets()
{
    wp_register_style('style', get_stylesheet_directory_uri() . '/code/public/css/style.css', []);
    wp_register_script('main', get_stylesheet_directory_uri() . '/code/js/index.js', ['jquery']);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true);
    wp_enqueue_style('style');
    wp_enqueue_script('main');
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

function montheme_init()
{
    register_taxonomy('Catégorie', 'sneakers', [
        'labels' => [
            'name' => 'Sneaker',
            'singular_name'     => 'Catégorie',
            'plural_name'       => 'Catégories',
            'search_items'      => 'Rechercher des Catégories',
            'all_items'         => 'Toutes les Catégories',
            'edit_item'         => 'Editer la Catégorie',
            'update_item'       => 'Mettre à jour la Catégorie',
            'add_new_item'      => 'Ajouter une nouvelle Catégorie',
            'new_item_name'     => 'Ajouter une nouvelle SneaCatégorieker',
            'menu_name'         => 'Catégorie',
        ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            
        ]);
}

register_taxonomy_for_object_type( 'Catégorie', 'sneakers' );

function montheme_types() {
    register_post_type('Sneakers', [
        'label' => 'Sneakers',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => get_template_directory_uri() . '/code/images/png/af1_logo.png',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'has_archive' => true,
        'meta_box_cb' => 'montheme_Reduc'
    ]);
}

add_action('init', 'montheme_types');

add_action( 'init', 'montheme_init');

add_action('wp_enqueue_scripts', 'montheme_register_assets');

add_action('after_setup_theme', 'montheme_supports'); 

add_filter('document_title_separator', 'montheme_title_separator');

add_filter('document_title_parts', 'montheme_document_title_parts');

require_once('metaboxes/reduc.php'); 
ReducMetaBox::register();

  add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'image-Survol',
      'label_name' => 'Image Survol',
      'label_set' => 'Set Image Survol',
      'label_use' => 'Set Image Survol',
      'post_type' => array( 'Sneakers' ),
    );
  
    $featured_images[] = $args;
  
    return $featured_images;
  });

  add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'image-sneakers-1',
      'label_name' => 'Image Sneakers 1',
      'label_set' => 'Set Image Sneakers 1',
      'label_use' => 'Set Image Sneakers 1',
      'post_type' => array( 'Sneakers' ),
    );
  
    $featured_images[] = $args;
  
    return $featured_images;
  });

  add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'image-sneakers-2',
      'label_name' => 'Image Sneakers 2',
      'label_set' => 'Set Image Sneakers 2',
      'label_use' => 'Set Image Sneakers 2',
      'post_type' => array( 'Sneakers' ),
    );
  
    $featured_images[] = $args;
  
    return $featured_images;
  });

  add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'image-sneakers-3',
      'label_name' => 'Image Sneakers 3',
      'label_set' => 'Set Image Sneakers 3',
      'label_use' => 'Set Image Sneakers 3',
      'post_type' => array( 'Sneakers' ),
    );
  
    $featured_images[] = $args;
  
    return $featured_images;
  });

  add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'image-sneakers-4',
      'label_name' => 'Image Sneakers 4',
      'label_set' => 'Set Image Sneakers 4',
      'label_use' => 'Set Image Sneakers 4',
      'post_type' => array( 'Sneakers' ),
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
        the_post_thumbnail( 'medium', $postID );
    }
}, 10, 2);

wp_enqueue_style('admin_montheme', get_stylesheet_directory_uri() . '/code/public/css/style.css');

wp_enqueue_script('admin_montheme', get_stylesheet_directory_uri() . '/code/js/custom_admin.js');





?>  