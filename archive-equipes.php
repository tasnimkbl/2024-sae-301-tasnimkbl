<?php get_header(); ?>

<div class="all-teams-container"> <!-- Conteneur principal -->
    <h2 class="teams-section-title">Toutes les Équipes</h2> <!-- Titre de la section -->

    <?php if (have_posts()) : ?>
        <ul class="teams-list"> <!-- Liste des équipes -->
            <?php while (have_posts()) : the_post(); ?>
                <li class="team-item"> <!-- Item d'équipe -->
                    <article class="team-card"> <!-- Carte d'équipe -->
                        <div class="thumbnail-container">
                            <?php the_post_thumbnail('medium', ['class' => 'centered-thumbnail']); ?>
                        </div>
                        <h3 class="team-title">
                            <a href="<?php the_permalink(); ?>" class="team-link">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="team-content">
                            <?php the_excerpt(); // Affiche un extrait du contenu ?>
                        </div>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p class="no-teams-message">Aucune équipe trouvée.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
