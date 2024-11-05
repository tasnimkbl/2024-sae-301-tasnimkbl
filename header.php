<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="wrap">
      <header>
       <h1>
        <a href="<?php echo home_url(); ?>" style="text-decoration: none; color: inherit;">
            PROJETS COLLECTIF
        </a>
    </h1>
        <h2><?php bloginfo('description'); ?></h2>
        <?php 
          wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container' => 'nav',
            'container_class' => 'header-menu'
          ));
        ?>
      </header>

