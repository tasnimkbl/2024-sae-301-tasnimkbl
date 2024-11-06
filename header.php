<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="<?php echo get_permalink(get_page_by_path('equipes')); ?>">Équipes</a></li>
            <li><a href="<?php echo get_permalink(get_page_by_path('joueurs')); ?>">Joueurs</a></li>
            <li><a href="<?php echo wp_login_url(); ?>">Connexion</a></li>
            <li><a href="<?php echo get_permalink(get_page_by_path('inscription')); ?>">Inscription</a></li>
            <li><a href="<?php echo get_permalink(get_page_by_path('mon-compte')); ?>">Mon Compte</a></li>
        </ul>
    </nav>
</header>


