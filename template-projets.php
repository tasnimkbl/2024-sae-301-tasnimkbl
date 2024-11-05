<?php
/* Template Name: Projets */

get_header(); 

// Paramètres de la requête pour récupérer les projets
$args = array(
    'post_type' => 'projets',
);

// Créer une nouvelle instance de WP_Query
$the_query = new WP_Query($args);

if ($the_query->have_posts()) : 
?>
    <div class="all-projects-container"> <!-- Conteneur principal -->
        <h2 class="projects-section-title">Tous les Projets</h2>
        <ul class="projects-list">
            <?php
            // Boucle sur les résultats
            while ($the_query->have_posts()) : $the_query->the_post(); 
            ?>
                <article class="project-card"> <!-- Carte de projet -->
                    <div class="thumbnail-container">
                        <?php the_post_thumbnail('medium', ['class' => 'centered-thumbnail']); ?>
                    </div>
                    <h3 class="project-title">
                        <a href="<?php the_permalink(); ?>" class="project-link"><?php the_title(); ?></a>
                    </h3>
                    <div class="project-content">
                        <?php the_excerpt(); // Affiche un extrait du contenu ?>
                    </div>
                </article>
            <?php 
            endwhile; 
            ?>
        </ul>
    </div>

    <?php
    // Réinitialiser la boucle WordPress après WP_Query
    wp_reset_postdata();

else : 
    ?>
    <p class="no-projects-message">Aucun projet n'a été trouvé.</p>
<?php 
endif;

get_footer();
?>

