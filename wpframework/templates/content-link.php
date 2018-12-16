<?php 

/**
 * content-link.php
 * 
 * The default template for displaying posts with the link post format
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <?php 
            the_content( __('Continue reading &rarr;', 'wp-framework') );
            wp_link_pages();
        ?>
    </div>

    <footer class="entry-footer">
        <p class="entry-meta">
            <!-- Display the meta information -->
            <?php wp_framework_post_meta(); ?>
        </p>
        <?php 
            // If we have a single page and author bio exists, display it
            if ( is_single() && get_the_author_meta( 'description' ) ) {
                echo '<h2>' . __( 'Written by ', 'wp-framework' ) . get_the_author() . '</h2>';
                echo '<p>' . the_author_meta( 'description' ) . '</p>';
            }
        ?>
    </footer>

</article>
