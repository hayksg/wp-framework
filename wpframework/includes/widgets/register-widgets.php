<?php

/**
 * register-widgets.php
 *
 * Register widgets
 */

// Register the widget areas
if ( ! function_exists( 'wp_framework_widget_init' ) ) {
    function wp_framework_widget_init() {
        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name' => __( 'Main Widget Area', 'wp-framework' ),
                'id' => 'sidebar-1',
                'description' => __( 'Appears on posts and pages', 'wp-framework' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            ) );

            register_sidebar( array(
                'name' => __( 'Footer Widget Area', 'wp-framework' ),
                'id' => 'sidebar-2',
                'description' => __( 'Appears on the footer', 'wp-framework' ),
                'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            ) );
        }
    }

    add_action( 'widgets_init', 'wp_framework_widget_init' );
}
