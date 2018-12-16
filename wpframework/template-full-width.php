<?php

/**
 * template-full-width.php
 *
 * Template Name: Full Width Page
 */

?>

<?php get_header();?>

<div class="col-md-12">

    <?php while (have_posts()): the_post();?>

        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <header class="entry-header">

                <!--
                    If the post has a thumbnail and it's not password protected
                    then display the thumbnail
                -->
                <?php if (has_post_thumbnail() && !post_password_required()): ?>
                <figure class="entry-thumbnail">
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => get_the_title()));?>
                </figure>
                <?php endif;?>

                <h1><?php the_title();?></h1>

            </header>

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </div>

            <footer class="entry-footer">
                <?php
                    if ( is_user_logged_in() ) {
                        echo '<p>';
                        edit_post_link( __( 'Edit', 'wp-framework' ), '<span class="meta-edit">', '</span>' );
                        echo '</p>';
                    }
                ?>
            </footer>
        </article>

        <?php comments_template(); ?>

    <?php endwhile; ?>

</div>

<?php get_footer();?>
