<?php

/**
 * tag.php
 * 
 * The template for displaying tag pages
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
            
                <h2>
                    <?php 
                        printf( __( 'Tag Archives for &quot;%s&quot;', 'wp-framework' ), single_tag_title( '', false) );
                    ?>
                </h2>

                <!-- Show an optional tag description -->

                <?php if ( tag_description() ) : ?>
                    <p><?php echo tag_description() ?></p>
                <?php endif; ?>

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
