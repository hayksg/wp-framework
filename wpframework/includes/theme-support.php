<?php

/**
 * theme-support.php
 * 
 * Functions for theme support
 */

// Set up theme default and register various supported features
if ( ! function_exists( 'wp_framework_setup' ) ) {
    function wp_framework_setup() {

        /**
         * Make the theme available for translation
         */

        $lang_dir = THEMEROOT . '/lang';
        load_theme_textdomain( 'wp-framework', $lang_dir );

        /**
         * Add support for post formats
         */

        add_theme_support( 'post-formats', array(
            'gallery',
            'link',
            'image',
            'quote',
            'video',
            'audio',
        ) );

        /**
         * Activate HTML5 Features
         */

        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        /**
         * Add support for automatic feed links
         */

        add_theme_support( 'automatic-feed-links' );

        /**
         * Add support for post thumbnails
         */

        add_theme_support( 'post-thumbnails' );

        /**
         * Add tag title into header
         */

        add_theme_support( 'title-tag' );

        /**
         * Register nav menus
         */

        register_nav_menus( array(
            'main-menu' => __( 'Main Menu', 'wp-framework' ),
        ) );
    }

    add_action( 'after_setup_theme', 'wp_framework_setup' );
}

// Display meta information for a specific post
if ( ! function_exists( 'wp_framework_post_meta' ) ) {
    function wp_framework_post_meta() {
        $output = '<ul class="list-inline entry-meta">';

        if ( get_post_type() === 'post' ) {

            // If the post is sticky, mark it
            if ( is_sticky() ) {
                $output .= '<li class="meta-featured-post">';
                $output .= '<i class="fa fa-thumb-tack"></i> ';
                $output .= __( 'Sticky', 'wp-framework' );
                $output .= '</li>';
            }

            // Get the post author
            $output .= sprintf(
                '<li class="meta-aithor"><a href="%1$s" rel="author">%2$s</a></li>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()
            );

            // Get the date
            $output .= '<li class="meta-date">' . get_the_date() . '</li>';

            // The categories
            $categories_list = get_the_category_list( ', ' );
 
            if ( $categories_list ) {
                $output .= '<li class="meta-categories">' . $categories_list . '</li>';
            }

            // The tags
            $tag_list = get_the_tag_list( '', ', ' );
 
            if ( $tag_list ) {
                $output .= '<li class="meta-tags">' . $tag_list . '</li>';
            }

            // Comments link
            if ( comments_open() ) {
                $output .= '<li>';
                $output .= '<span class="meta-replay">';
                $output .= get_comments_popup_link( 
                    __( 'Leave a comment', 'wp-framework' ),
                    __( 'One comment so far', 'wp-framework' ),  
                    __( 'View all % comments', 'wp-framework' ) 
                );
                $output .= '</span>';
                $output .= '</li>';
            }

            // Edit link
            if ( is_user_logged_in() ) {
                $output .= '<li>';
                $output .= return_edit_post_link( __( 'Edit', 'wp-framework' ), '<span class="meta-edit">', '</span>' );
                $output .= '</li>';
            }
        }

        echo $output;
    }
}

// Display navigation to the previous/next set of posts
if ( ! function_exists( 'wp_framework_paging_nav' ) ) {
    function wp_framework_paging_nav() {
        $output = '<ul>';
        if ( get_previous_posts_link() ) {
            $output .= '<li class="next">';
            $output .= get_previous_posts_link( __( 'Newer Posts &rarr;', 'wp-framework' ) );
            $output .= '</li>';
        }
        if ( get_next_posts_link() ) {
            $output .= '<li class="previous">';
            $output .= get_next_posts_link( __( '&larr; Older Posts', 'wp-framework' ) );
            $output .= '</li>';
        }
        $output .= '</ul>';

        echo $output;
    }
}
