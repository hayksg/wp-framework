<?php

/**
 * author.php
 * 
 * The template for displaying author archive pages
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">
        <?php if ( have_posts() ) : the_post(); ?>

            <header class="page-header">
                <h2>
                    <?php printf( __( 'All posts by %s ', 'wp-framework' ), get_the_author() ); ?>
                </h2>

                <!-- If the author bio exists, display it -->
                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <p><?php the_author_meta( 'description' ); ?></p>
                <?php endif; ?>

                <?php rewind_posts(); ?>
            </header>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'templates/content', get_post_format() ); ?>
            <?php endwhile; ?>

            <?php wp_framework_paging_nav(); ?>

        <?php else: ?>
            <?php get_template_part( 'templates/content', 'none' ); ?>
        <?php endif; ?>
    </div>

    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>
    
<?php get_footer(); ?>
