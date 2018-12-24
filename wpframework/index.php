<?php

/**
 * index.php
 * 
 * The main template file
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">

        <h4><i class="fas fa-cog"></i> Setting Up</h4>
        <ol>
            <li>Go to Settings/Permalinks/Permalink Settings -> Common Settings, switch to "Post name".</li>
            <li>Run "npm i" from theme root.</li>
            <li>Lastly run "npm run watch" and copy "fonts" folder from dist to wordpress root.</li> <!-- in order to make font-awesome to work correctly -->
        </ol>
        <hr>

        <h4><i class="fab fa-vuejs" style="color: #34495E;"></i> Using VueJS</h4>
        <div id="vue-code">
            <vue-message message="Hello from Vue component"></vue-message>
        </div>
        <hr>

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
