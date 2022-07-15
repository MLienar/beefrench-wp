<?php 

    function montheme_supports (){
        add_theme_support( 'title-tag');
    }

    function montheme_register_assets (){
        wp_register_style(get_template_directory_uri( ), '/code/public/css/locomotive-scroll.css');
        wp_register_style(get_template_directory_uri()  , '/public/css/style.css',['locomotive']);
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js');
        wp_register_script('locomotive', './code/js/locomotive-scroll.min.js');
        wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js');
        wp_register_script('index', './code/js/index.js',['jquery', 'locomotive', 'gsap']);
        wp_enqueue_style('style');
        wp_enqueue_script('index');
    }
    add_action('after_setup_theme', 'montheme_supports');
    add_action( 'wp_enqueue_scripts', 'montheme_register_assets');
?>