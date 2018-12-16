<?php

/**
 * footer.php
 * 
 * The footer for the theme
 */

?>

        </div> <!-- end row from header.php -->
    </div> <!-- end main-content from header.php -->

    <footer class="footer">
        <hr>
        
        <div class="container">
            <!-- Load sidebar-footer.php -->
            <?php get_sidebar( 'footer' ); ?>
        </div>
       
        <hr>

        <div class="container">
            <div class="copyright">
                <p class="text-center">
                    &copy; <?php echo date( 'Y' ); ?>
                    <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                    <?php _e( 'All rights reserved', 'wp-framework' ); ?>
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </body>
</html>
