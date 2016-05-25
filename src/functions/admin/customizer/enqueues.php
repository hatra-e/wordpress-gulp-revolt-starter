<?php
/**
 * Functions to enqueue customizer styles and scripts.
 */



if ( ! function_exists( 'rvn_enqueue_customizer_scripts' ) ) :
    /**
     * Enqueues scripts for the customizer itself.
     * E.g. to enhance controls.
     *
     * @wp-hook customize_controls_print_footer_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_customizer_scripts()
    {
        // Enqueue customizer script
//        wp_enqueue_script(
//            'rvn_customizer',
//            RVN_TEMPLATE_URL.'/functions/admin/customizer/jquery.customizer.js',
//            array( 'jquery' ),
//            RVN_THEME_VERSION,
//            false
//        );
    }

    add_action( 'customize_controls_print_footer_scripts', 'rvn_enqueue_customizer_scripts' );
//    add_action( 'customize_controls_enqueue_scripts', 'rvn_enqueue_controls_scripts' );
endif;



if ( ! function_exists( 'rvn_enqueue_customizer_styles' ) ) :
    /**
     * Enqueues styles for the customizer itself.
     *
     * @wp-hook customize_controls_print_footer_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_customizer_styles()
    {
        // Enqueue customizer styles
//        wp_enqueue_style(
//            'rvn_theme-customizer',
//            RVN_TEMPLATE_URL . '/functions/admin/customizer/customizer.css',
//            false,
//            RVN_THEME_VERSION,
//            false
//        );

    }

    add_action( 'customize_controls_print_footer_scripts', 'rvn_enqueue_customizer_styles' );
//    add_action( 'customize_controls_enqueue_scripts', 'rvn_enqueue_customizer_styles' );
endif;



if ( ! function_exists( 'rvn_enqueue_customizer_preview_scripts' ) ) :
    /**
     * Enqueues scripts for the customizer to live-preview changes when controls are
     * adjusted.
     *
     * @wp-hook customize_preview_init
     * @since 1.0.0
     */
    function rvn_enqueue_customizer_preview_scripts()
    {
        // Enqueue custom customizer preview script
        wp_enqueue_script(
            'rvn_customizer-preview',
            RVN_TEMPLATE_URL . '/functions/admin/customizer/jquery.live-preview.js',
            array( 'jquery', 'customize-preview' ),
            RVN_THEME_VERSION,
            true
        );
    }

    add_action('customize_preview_init', 'rvn_enqueue_customizer_preview_scripts');
endif;