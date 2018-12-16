<?php 

/**
 * content-gallery.php
 * 
 * The default template for displaying posts with the Gallery post format
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <!-- 
            If single page display the title
            Else, we display the title in a link
         -->
        <?php if ( is_single() ) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php endif; ?>

        <p class="entry-meta">
            <!-- Display the meta information -->
            <?php wp_framework_post_meta(); ?>
        </p>
    </header>

    <div class="entry-content">
        <?php 
            the_content( __('Continue reading &rarr;', 'wp-framework') );
            wp_link_pages();
        ?>
    </div>

    <footer class="entry-footer">
        <?php 
            // If we have a single page and author bio exists, display it
            if ( is_single() && get_the_author_meta( 'description' ) ) {
                echo '<h2>' . __( 'Written by ', 'wp-framework' ) . get_the_author() . '</h2>';
                echo '<p>' . the_author_meta( 'description' ) . '</p>';
            }
        ?>
    </footer>

</article>
