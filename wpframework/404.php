<?php

/**
 * 404.php
 * 
 * The template for displaying 404 pages (Not Found)
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">
        
        <h1><?php _e( 'Error 404 - Nothing Found', 'wp-framework' ) ?></h1>

        <p><?php _e( 'It looks like nothink was found here. Maybe try a search?', 'wp-framework' ) ?></p>

        <p><?php get_search_form(); ?></p>

    </div>
    
<?php get_footer(); ?>
