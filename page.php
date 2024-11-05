<?php
/*
Template Name: Page Template
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="wrap">
        <!-- Aucun contenu n'est présent ici -->
        <?php 
        // Laisser vide pour le moment
        ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>

