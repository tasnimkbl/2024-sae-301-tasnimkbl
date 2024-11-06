<?php get_header(); ?>
<main>
    <div class="homepage-message">
        <h2>Bienvenue sur Rocket League Arena</h2>
        <p>Rejoignez-nous pour le tournoi de Rocket League et montrez vos compétences !</p>
    </div>
    
    <section class="upcoming-matches">
        <h3>Prochains Matchs</h3>
        <?php
        $args = [
            'post_type' => 'matchs',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'ASC'
        ];
        $matchs = new WP_Query($args);
        if ($matchs->have_posts()) {
            while ($matchs->have_posts()) {
                $matchs->the_post(); ?>
                <div class="card">
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_content(); ?></p>
                </div>
            <?php }
            wp_reset_postdata();
        } else {
            echo '<p>Aucun match à venir.</p>';
        }
        ?>
    </section>
</main>
<?php get_footer(); ?>