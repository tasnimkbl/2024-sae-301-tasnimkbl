<?php
/*
Template Name: Projets Sélectionnés
*/

get_header(); 

// Définir les arguments pour la requête WP_Query pour récupérer tous les projets
$args = array(
    'post_type' => 'projets', 
    'posts_per_page' => -1,   
);

$projets = new WP_Query($args);

if ($projets->have_posts()) : ?>
    <div class="selected-projects-container">
        <h2 class="selected-projects-title">Projets Sélectionnés</h2>
        <ul class="projects-list">
            <?php
            while ($projets->have_posts()) : $projets->the_post();
                $projet_id = get_the_ID(); 
                ?>
                <li class="project-item">
                    <h3 class="project-title"><?php the_title(); ?></h3>
                    <p class="team-selection">
                        <strong>Équipes ayant sélectionné ce projet :</strong> 
                        <?php
                        $equipes_args = array(
                            'post_type' => 'equipes',
                            'posts_per_page' => -1,  
                        );
                        
                        $equipes = new WP_Query($equipes_args);
                        $equipes_selectionnees = array(); 
                        
                        if ($equipes->have_posts()) {
                            while ($equipes->have_posts()) {
                                $equipes->the_post();
                                $projets_selectionnes = get_field('projets_selectionnes');
                                
                                if ($projets_selectionnes) {
                                    $projets_selectionnes_ids = array();
                                    foreach ($projets_selectionnes as $projet) {
                                        $projets_selectionnes_ids[] = is_numeric($projet) ? $projet : $projet->ID;
                                    }
                                    if (in_array($projet_id, $projets_selectionnes_ids)) {
                                        $equipes_selectionnees[] = get_the_title();
                                    }
                                }
                            }
                        }

                        if (!empty($equipes_selectionnees)) {
                            echo implode(', ', $equipes_selectionnees);
                        } else {
                            echo 'Aucune équipe n\'a sélectionné ce projet.';
                        }

                        wp_reset_postdata();
                        ?>
                    </p>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
    <p class="no-projects-message">Aucun projet trouvé.</p>
<?php endif;

get_footer();
?>
