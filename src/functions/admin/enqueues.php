<?php
/**
 * Admin Enqueue Functions
 *
 * Enqueues the admin scripts and styles.
 */



if ( ! function_exists( 'rvn_enqueue_admin_scripts' ) ) :
    /**
     * Enqueue scripts for the admin area.
     *
     * @wp-hook wp_enqueue_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_admin_scripts()
    {
        // Enqueue meta boxes toggle jQuery script in footer
        wp_enqueue_script(
            'rvn_cmb2-toggler',
            RVN_TEMPLATE_URL . '/functions/admin/metaboxes/jquery.cmb2-toggler.js',
            array( 'jquery' )
        );
    }

    add_action( 'admin_enqueue_scripts', 'rvn_enqueue_admin_scripts' );
endif;



if ( ! function_exists( 'rvn_enqueue_admin_styles' ) ) :
    /**
     * Enqueue styles for the admin area.
     *
     * @wp-hook wp_enqueue_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_admin_styles()
    {
        // Enqueue meta boxes stylesheet
//        wp_enqueue_style(
//            'rvn_meta-boxes', RVN_TEMPLATE_URL . '/functions/meta-boxes/meta-boxes.css',
//            array(),
//            RVN_THEME_VERSION
//        );
    }

    add_action( 'admin_enqueue_scripts', 'rvn_enqueue_admin_styles' );
endif;