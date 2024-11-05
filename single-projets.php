<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="project-detail">
            <div class="thumbnail-container">
                <?php the_post_thumbnail('large', array('class' => 'centered-thumbnail')); ?>
            </div>
            <h1 class="project-title">
                <?php the_title(); ?>
            </h1>
            <div class="project-commissioner">
                <strong>Commanditaire :</strong> <span><?php the_field('commanditaire'); ?></span>
            </div>
            <div class="project-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p class="nothing">Aucun projet trouvé.</p>
<?php endif; ?>

<?php get_footer(); ?>
