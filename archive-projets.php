<?php get_header(); ?>

<div class="all-projects-container"> <!-- Conteneur principal -->
    <h2 class="projects-section-title">Tous les Projets</h2> <!-- Titre de la section -->
    
    <?php if (have_posts()) : ?>
        <ul class="projects-list"> <!-- Liste des projets -->
            <?php while (have_posts()) : the_post(); ?>
                <li class="project-item"> <!-- Item de projet -->
                    <article class="project-card"> <!-- Carte de projet -->
                        <div class="thumbnail-container">
                            <?php the_post_thumbnail('medium', ['class' => 'centered-thumbnail']); ?>
                        </div>
                        <h3 class="project-title">
                            <a href="<?php the_permalink(); ?>" class="project-link">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="project-content">
                            <?php the_excerpt(); // Affiche un extrait du contenu ?>
                        </div>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p class="no-projects-message">Aucun projet trouvé.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
