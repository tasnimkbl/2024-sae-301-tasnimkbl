 <?php if (have_posts()) : ?>
    <div class="posts-wrapper">
        <p class="title">Articles récents :</p>
        
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class('post'); ?>>
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="post-content">
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p class="nothing">
        Il n'y a pas de post à afficher !
    </p>
<?php endif; ?>

