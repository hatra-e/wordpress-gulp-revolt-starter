<?php
/**
 * Functions.php
 *
 * Defines constants and includes all parts of the theme.
 */



/*
 * Define constants
 */

define( 'RVN_THEME_VERSION', wp_get_theme()->version );
define( 'RVN_TEMPLATE_PATH', get_template_directory() );
define( 'RVN_TEMPLATE_URL', get_template_directory_uri() );



/*
 * Includes
 */

// Admin: Functions
require_once( 'functions/admin/setup.php' );
require_once( 'functions/admin/sidebars.php' );
require_once( 'functions/admin/enqueues.php' );

// Admin: Metaboxes
require_once( 'functions/admin/metaboxes/cmb2/init.php' );
//require_once( 'functions/admin/metaboxes/symlink-filter.php' );
require_once( 'functions/admin/metaboxes/post-formats.php' );

// Admin: Customizer
require_once( 'functions/admin/customizer/enqueues.php' );
require_once( 'functions/admin/customizer/controls-interface.php' );
require_once( 'functions/admin/customizer/controls.php' );
require_once( 'functions/admin/customizer/output-helpers.php' );
require_once( 'functions/admin/customizer/output.php' );

// Admin: Post Types
require_once( 'functions/admin/post-types/portfolio.php' );

// Functions
require_once( 'functions/classes.php' );
require_once( 'functions/comments.php' );
require_once( 'functions/conditionals.php' );
require_once( 'functions/content-modifiers.php' );
require_once( 'functions/enqueues.php' );
require_once( 'functions/entry.php' );
require_once( 'functions/helpers.php' );
require_once( 'functions/nav-menus.php' );
require_once( 'functions/page.php' );
require_once( 'functions/pagination.php' );
