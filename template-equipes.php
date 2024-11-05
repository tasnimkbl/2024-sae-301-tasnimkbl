<?php
/* Template Name: Équipes */

get_header(); 

$args = array(
    'post_type' => 'equipes', 
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) : 
?>
    <div class="page-container"> <!-- Conteneur principal -->
        <h2 class="page-title">Toutes les équipes</h2>
        <ul class="student-list"> <!-- Conteneur des cards -->
            <?php
            while ($the_query->have_posts()) : $the_query->the_post(); 
            ?>
                <li class="team-item"> <!-- Chaque card est une "team-item" -->
                    <article class="team-card">
                        <div class="thumbnail-container">
                            <?php the_post_thumbnail('medium', ['class' => 'centered-thumbnail']); ?>
                        </div>
                        <h3 class="team-title">
                            <a href="<?php the_permalink(); ?>" class="team-link"><?php the_title(); ?></a>
                        </h3>
                        <div class="team-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

<?php
wp_reset_postdata();
else :
    echo '<p class="nothing">Aucune équipe trouvée.</p>';
endif;

get_footer();
?>


