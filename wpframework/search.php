<?php

/**
 * search.php
 * 
 * The template for displaying search results
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
            
                <h2>
                    <?php 
                        printf( __( 'Search Results for &quot;%s&quot;', 'wp-framework' ), get_search_query() );
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
