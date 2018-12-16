<?php

/**
 * archive.php
 * 
 * The template for displaying archive pages
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">

                <h2>
                    <?php 
                        if ( is_day() ) {
                            printf( __( 'Daily Archives for %s', 'wp-framework' ), get_the_date() );
                        } elseif ( is_month() ) {
                            printf( __( 'Monthly Archives for %s', 'wp-framework' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'wp-framework' ) ) );
                        } elseif ( is_year() ) {
                            printf( __( 'Yearly Archives for %s', 'wp-framework' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'wp-framework' ) ) );
                        } else {
                            _e( 'Archives', 'wp-framework' );
                        }
                    ?>
                </h2>

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
