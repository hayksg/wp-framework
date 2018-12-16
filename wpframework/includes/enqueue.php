<?php

/**
 * enqueue.php
 *
 * Enqueue styles and scripts
 */

if ( ! function_exists( 'wp_enqueue' ) ) {
    function wp_enqueue() {
        // Add support for pages with threaded comments
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_register_style( 'app-style', get_template_directory_uri() . '/dist/app.css', array(), '1.0.0' );
        wp_enqueue_style( 'app-style' );
    
        wp_register_script( 'app-script', get_template_directory_uri() . '/dist/app.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'app-script' );
    }
      
    add_action( 'wp_enqueue_scripts', 'wp_enqueue' );
}
