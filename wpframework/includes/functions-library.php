<?php

/**
 * functions-library.php
 * 
 * The collection of useful functions
 */

// Remove version string from js and css

function remove_wp_version_strings( $src ) {
    global $wp_version;

    parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
    if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }

    return $src;
}

add_filter( 'script_loader_src', 'remove_wp_version_strings' );
add_filter( 'style_loader_src',  'remove_wp_version_strings' );

// Remove metatag generator from header

function remove_meta_version() {
    return '';
}

add_filter( 'the_generator', 'remove_meta_version' );

// Wordpress has function comments_popup_link,
// that echo comments popup link,
// but if you need to return comments popup link use this function

function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments' );
    if ( false === $one ) $one = __( '1 Comment' );
    if ( false === $more ) $more = __( '% Comments' );
    if ( false === $none ) $none = __( 'Comments Off' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s'), $title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}

// Related with the function above

function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment') : $one;
 
    return apply_filters('comments_number', $output, $number);
}

// Instead of echo, return edit_post_link function value

function return_edit_post_link( $text = null, $before = '', $after = '', $id = 0, $class = 'post-edit-link' ) { 
    if ( ! $post = get_post( $id ) ) { 
        return; 
    } 
 
    if ( ! $url = get_edit_post_link( $post->ID ) ) { 
        return; 
    } 
 
    if ( null === $text ) { 
        $text = __( 'Edit This' ); 
    } 
 
    $link = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $url ) . '">' . $text . '</a>'; 
 
    /** 
     * Filters the post edit link anchor tag. 
     * 
     * @since 2.3.0 
     * 
     * @param string $link    Anchor tag for the edit link. 
     * @param int    $post_id Post ID. 
     * @param string $text    Anchor text. 
     */ 
    return $before . apply_filters( 'edit_post_link', $link, $post->ID, $text ) . $after; 
}
