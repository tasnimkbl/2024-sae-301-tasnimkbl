<?php
/*
Template Name: Joueurs
*/
get_header(); 
?>

<div class="joueurs-content">
    <h1>Joueurs Inscrits</h1>

    <?php
    $args = array(
        'post_type' => 'joueurs', // Spécifiez le type de contenu
        'posts_per_page' => -1,  // Récupérer tous les joueurs
    );

    $joueurs = new WP_Query($args);

    if ($joueurs->have_posts()) : ?>
        <div class="joueurs-list">
            <?php while ($joueurs->have_posts()) : $joueurs->the_post(); ?>
                <div class="joueur-card">
                    <h2><?php the_title(); ?></h2>
                    <div class="joueur-details">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="view-details">Voir Détails</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Aucun joueur trouvé.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>

