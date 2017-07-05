<?php
/**
 * Theme Setup
 */



/*
 * Set global content width
 */

if ( ! isset( $content_width ) ) :

    // Max content width
    $content_width = 1200;

endif;



/**
 * Theme Setup
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as
 * indicating support post thumbnails.
 *
 * @wp-hook after_setup_theme
 * @since 1.0.0
 */
if ( ! function_exists( 'rvn_theme_setup' ) ) :
    function rvn_theme_setup()
    {
        //
        // Localization
        //
        // Translations can be added to the /languages directory.
        //

        load_theme_textdomain( 'rvn', RVN_TEMPLATE_PATH . '/languages' );


        //
        // Automatic feed links
        //
        // Add RSS feed links to <head> for posts and comments.
        //

        add_theme_support( 'automatic-feed-links' );


        //
        // Let WordPress manage the document title.
        //

        add_theme_support( 'title-tag' );


        //
        // Post formats
        //
        // Adds support for a variety of post formats.
        //

        add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'image',
            'video',
            'audio',
            'link',
            'quote',
            'status',
        ) );


        //
        // Register nav menus
        //
        // This theme uses wp_nav_menu() in two locations.
        //

        register_nav_menus( array(
            'main'   => __( 'Main Menu', 'rvn' ),
            'footer' => __( 'Footer Menu', 'rvn' ),
        ) );


        //
        // Featured images
        //
        // Add support for featured images and thumbnail sizes.
        //

        global $content_width;

        $gallery_slider_height  = $content_width / 1.33333333333; // 4:3 aspec ratio
        $cropped_gallery_width  = $content_width / 2;
        $cropped_gallery_height = $content_width / 2;

        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( $content_width, 0, false );

        add_image_size( 'gallery-slider',  $content_width, $gallery_slider_height, true ); // 4:3 aspec ratio
        add_image_size( 'gallery-cropped', $cropped_gallery_width, $cropped_gallery_height, true );


        //
        // Add support for custom logo.
        //

        add_theme_support( 'custom-logo', array(
            'height'      => 150,
            'width'       => 400,
//            'flex-width'  => true,
//            'flex-height' => true,
        ) );


        //
        // Add custom background controls to customizer.
        //

//         add_theme_support( 'custom-background' );


        //
        // Add support for HTML5 markup for certain sections of the theme
        //

        add_theme_support( 'html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
        ) );


        //
        // Disable default gallery style, to later define our own.
        //

//        add_filter( 'use_default_gallery_style', '__return_false' );


        //
        // Add support for our own editor style
        //

//         add_editor_style();


        //
        // Allow shortcodes in widgets.
        //

        add_filter( 'widget_text', 'do_shortcode' );


    }

    add_action( 'after_setup_theme', 'rvn_theme_setup' );
endif;