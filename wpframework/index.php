<?php

/**
 * index.php
 * 
 * The main template file
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">

    <h3> <i class="fas fa-arrow-up"></i> Foo </h3>
    <h3> <i class="fas fa-arrow-down"></i> Bar </h3>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'templates/content', get_post_format() ); ?>

            <?php endwhile; ?>

            <?php wp_framework_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>
    </div>

    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>
    
<?php get_footer(); ?>
