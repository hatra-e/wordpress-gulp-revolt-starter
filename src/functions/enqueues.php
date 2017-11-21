<?php
/**
 * Enqueue Functions
 *
 * Enqueues the themes scripts and styles.
 */



if ( ! function_exists( 'rvn_enqueue_scripts' ) ) :
    /**
     * Enqueue scripts for frontend use.
     *
     * @wp-hook wp_enqueue_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_scripts()
    {
        // Enqueue script for comment reply.
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // Enqueue custom jQuery functions and code
        wp_enqueue_script(
            'rvn_main',
            RVN_TEMPLATE_URL . '/js/jquery.main.js',
            array( 'jquery' ),
            RVN_THEME_VERSION
        );

        // Enqueue matchHeight.js
        wp_enqueue_script(
            'rvn_match-height',
            RVN_TEMPLATE_URL . '/plugins/match-height/jquery.matchHeight.js',
            array( 'jquery', 'rvn_main' ),
            RVN_THEME_VERSION,
            true
        );

        // Enqueue FitVids.js
        wp_enqueue_script(
            'rvn_fitvids',
            RVN_TEMPLATE_URL . '/plugins/fitvids/jquery.fitvids.js',
            array( 'jquery', 'rvn_main' ),
            RVN_THEME_VERSION,
            true
        );

        // Enqueue Flexslider
        wp_enqueue_script(
            'rvn_flexslider',
            RVN_TEMPLATE_URL . '/plugins/flexslider/jquery.flexslider-min.js',
            array( 'jquery', 'rvn_main' ),
            RVN_THEME_VERSION,
            true
        );
    }

    add_action( 'wp_enqueue_scripts', 'rvn_enqueue_scripts' );
endif;



if ( ! function_exists( 'rvn_enqueue_styles' ) ) :
    /**
     * Enqueue styles for frontend use.
     *
     * @wp-hook wp_enqueue_scripts
     * @since 1.0.0
     */
    function rvn_enqueue_styles()
    {
        // Enqueue Flexslider
        wp_enqueue_style(
            'rvn_flexslider',
            RVN_TEMPLATE_URL . '/plugins/flexslider/flexslider.css',
            array(),
            RVN_THEME_VERSION
        );

        // Enqueue style.css
        wp_enqueue_style(
            'style',
            get_stylesheet_uri(),
            array(),
            RVN_THEME_VERSION
        );
    }

    add_action( 'wp_enqueue_scripts', 'rvn_enqueue_styles' );
endif;