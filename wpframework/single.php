<?php

/**
 * single.php
 *
 * The template for displaying single posts
 */

?>

<?php get_header();?>

<div class="col-md-8">

    <div id="vue-code">
        <hello></hello>
    </div>

    <?php while (have_posts()): the_post();?>

        <?php get_template_part( 'templates/content', get_post_format() ); ?>

        <?php comments_template(); ?>

    <?php endwhile; ?>

</div>

<div class="col-md-4">
    <?php get_sidebar();?>
</div>

<?php get_footer();?>
