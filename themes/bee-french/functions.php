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
    wp_register_script('main', get_stylesheet_directory_uri() . '/code/js/index.js', []);
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




add_action('wp_enqueue_scripts', 'montheme_register_assets');

add_action('after_setup_theme', 'montheme_supports'); 

add_filter('document_title_separator', 'montheme_title_separator');

add_filter('document_title_parts', 'montheme_document_title_parts');

?>