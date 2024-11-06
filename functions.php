<?php
function rocketleaguearena_enqueue_scripts() {
    // Enqueue styles and scripts
    wp_enqueue_style('style', get_stylesheet_uri());
}
function theme_setup() {
    // Ajouter le support des menus
    add_theme_support('menus');

    // Enregistrer les emplacements de menu
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'text_domain'), // Menu principal
        'footer' => __('Menu Footer', 'text_domain'), // Menu du footer
    ));
}
add_action('after_setup_theme', 'theme_setup');
add_action('after_setup_theme', 'theme_setup');


add_action('wp_enqueue_scripts', 'rocketleaguearena_enqueue_scripts');

// Enregistrement des types de contenu personnalisés
function custom_post_types() {
    // Type de contenu pour les Matchs
    register_post_type('matchs', array(
        'label' => 'Matchs',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'), // Ajoutez les champs nécessaires
        'has_archive' => true,
        'rewrite' => array('slug' => 'matchs'),
    ));

    // Type de contenu pour les Joueurs
    register_post_type('joueurs', array(
        'label' => 'Joueurs',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'joueurs'),
    ));

    // Type de contenu pour les Équipes
    register_post_type('equipes', array(
        'label' => 'Équipes',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'equipes'),
    ));
}
add_action('init', 'custom_post_types');


add_action('init', 'rocketleaguearena_custom_post_types');

// Enable support for post thumbnails
add_theme_support('post-thumbnails');



