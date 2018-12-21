<?php

/**
 * index.php
 * 
 * The main template file
 */

?>

<?php get_header(); ?>

    <div class="col-md-8">

        <h3><i class="fas fa-bullhorn"></i> Attention</h3>
        <ol>
            <li>Run "npm i" and copy "fonts" folder to wordpress root <br>(in order to make font-awesome to work correctly)</li>
            <li>Go to Settings/Permalinks/Permalink Settings switch to Post name</li>
        </ol>
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
