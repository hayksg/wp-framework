<?php

/**
 * functions.php
 *
 * The theme's functions and definitions
 */

// Define constatnts
define( 'THEMEROOT', get_template_directory() );

// Loads the needed files
require_once( THEMEROOT . '/includes/functions-library.php' );
require_once( THEMEROOT . '/includes/theme-support.php' );
require_once( THEMEROOT . '/includes/wp-bootstrap-navwalker.php' );
require_once( THEMEROOT . '/includes/enqueue.php' );
require_once( THEMEROOT . '/includes/widgets/register-widgets.php' );
