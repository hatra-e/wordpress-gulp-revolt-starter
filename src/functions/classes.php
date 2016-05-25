<?php
/**
 * Class Modifier Functions
 *
 * Outputs custom classes for various elements, mostly depending on location.
 */



if ( ! function_exists( 'rvn_add_body_classes' ) ) :
    /**
     * Adds classes to the body tag.
     *
     * @param array $classes Classes for the body element.
     * @return array
     * @since 1.0
     */
    function rvn_add_body_classes( $classes )
    {
        // Front Page
        if( is_front_page() ) {

        }

        // Blog
        elseif( is_home() ) {

        }

        // Portfolio
        elseif( rvn_is_portfolio() || rvn_is_portfolio_archive() ) {

        }

        // Archive
        elseif( is_archive() || is_tax() ) {

        }

        // Search
        elseif( is_search() ) {

        }

        // Index
        elseif ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Singular (Posts, Pages Attachments)
        elseif ( is_singular() ) {

        }

        // Single Post
        elseif ( is_single() ) {

        }

        // Page
        elseif ( is_page() ) {

        }

        return $classes;
    }

    add_filter( 'body_class', 'rvn_add_body_classes' );
endif;



if ( ! function_exists( 'rvn_add_post_classes' ) ) :
    /**
     * Adds classes to posts.
     *
     * @param array $classes Classes for the post.
     * @return array
     * @since 1.0
     */
    function rvn_add_post_classes($classes)
    {
        // All
        $classes[] = 'c-entry';

        // Front Page
        if( is_front_page() ) {

        }

        // Blog
        elseif( is_home() ) {

        }

        // Portfolio
        elseif( rvn_is_portfolio() || rvn_is_portfolio_archive() ) {

        }

        // Archive
        elseif( is_archive() || is_tax() ) {

        }

        // Search
        elseif( is_search() ) {

        }

        // Index
        elseif ( ! is_singular() ) {

        }

        // Singular (Posts, Pages Attachments)
        elseif ( is_singular() ) {

        }

        // Single Post
        elseif ( is_single() ) {

        }

        // Page
        elseif ( is_page() ) {

        }

        return $classes;
    }

    add_filter( 'post_class', 'rvn_add_post_classes' );
endif;