<?php

/**
 * index.php
 * 
 * The main template file
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">

    <h6> <i class="fas fa-arrow-up"></i> Run "npm i" and copy "fonts" folder to wordpress root <br>(in order to make font-awesome to work correctly) </h6>
    <h6> <i class="fas fa-arrow-down"></i> FooBar </h6>

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
