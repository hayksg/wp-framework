<?php

/**
 * header.php
 * 
 * The header for the theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Site Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
                <?php 
                    wp_nav_menu( array(
                        'theme_location'  => 'main-menu',
                        'container'       => false,
                        'container_class' => false,
                        'menu_class'      => 'navbar-nav mr-auto',
                        'walker'          => new Bootstrap_NavWalker,
                    ) ); 
                ?>

                <?php get_search_form(); ?>
                
            </div>
        </div>
    </nav>

    <div class="container main-content" role="main">
        <div class="row">

        
