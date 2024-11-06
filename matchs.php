<?php
/*
Template Name: Matchs
*/
get_header(); 
?>

<div class="matchs-content">
    <h1>Matchs à venir</h1>

    <?php
    $args = array(
        'post_type' => 'matchs', // Spécifiez le type de contenu
        'posts_per_page' => -1,  // Récupérer tous les matchs
    );

    $matchs = new WP_Query($args);

    if ($matchs->have_posts()) : ?>
        <div class="matchs-list">
            <?php while ($matchs->have_posts()) : $matchs->the_post(); ?>
                <div class="match-card">
                    <h2><?php the_title(); ?></h2>
                    <div class="match-details">
                        <?php the_excerpt(); // Affichez un extrait du contenu ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="view-details">Voir Détails</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Aucun match trouvé.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
