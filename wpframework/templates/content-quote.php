<?php 

/**
 * content-quote.php
 * 
 * The default template for displaying posts with the Quote post format
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
    </footer>

</article>
