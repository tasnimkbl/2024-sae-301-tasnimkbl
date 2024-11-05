<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="team-container"> <!-- Conteneur pour les cartes d'équipe -->
        <?php while (have_posts()) : the_post(); ?>
            <article class="team-card"> <!-- Carte d'équipe -->
                <!-- Image mise en avant -->
                <div class="thumbnail-container">
                    <?php the_post_thumbnail('medium', ['class' => 'centered-thumbnail']); ?>
                </div>
                
                <!-- Titre de l'équipe -->
                <h1 class="team-title">
                    <?php the_title(); ?>
                </h1>
                
                <!-- Liste des étudiants dans l'équipe -->
                <div class="team-members">
                    <ul class="student-list"> <!-- Classe pour la liste des étudiants -->
                        <?php
                        // Récupérer les ID des utilisateurs des champs ACF
                        $student_ids = array(
                            get_field("Etudiant_1"),
                            get_field("Etudiant_2"),
                            get_field("Etudiant_3"),
                            get_field("Etudiant_4")
                        );

                        // Utiliser $wpdb pour récupérer les noms des utilisateurs
                        global $wpdb;

                        foreach ($student_ids as $student_id) {
                            if ($student_id) {
                                // Requête pour obtenir le display_name de l'utilisateur à partir de son ID
                                $user_name = $wpdb->get_var($wpdb->prepare("
                                    SELECT display_name 
                                    FROM {$wpdb->users}
                                    WHERE ID = %d
                                ", $student_id));

                                // Afficher le nom de l'utilisateur
                                if ($user_name) {
                                    echo '<li class="student-item">' . esc_html($user_name) . '</li>'; // Classe pour les items d'étudiants
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>

                <!-- Contenu de l'article -->
                <div class="team-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p class="nothing">Aucune équipe trouvée.</p>
<?php endif; ?>

<?php get_footer(); ?>
