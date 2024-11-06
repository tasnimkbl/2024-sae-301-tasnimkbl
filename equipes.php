<?php
/*
Template Name: Équipes
*/
get_header(); 
?>

<div class="equipes-content">
    <h1>Équipes Inscrites</h1>

    <?php
    $args = array(
        'post_type' => 'equipes', // Spécifiez le type de contenu
        'posts_per_page' => -1,  // Récupérer toutes les équipes
    );

    $equipes = new WP_Query($args);

    if ($equipes->have_posts()) : ?>
        <div class="equipes-list">
            <?php while ($equipes->have_posts()) : $equipes->the_post(); ?>
                <div class="equipe-card">
                    <h2><?php the_title(); ?></h2>
                    <div class="equipe-details">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="view-details">Voir Détails</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Aucune équipe trouvée.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
