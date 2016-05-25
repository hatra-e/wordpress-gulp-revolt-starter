<?php
/**
 * Conditional Functions
 *
 * Functions to check for various locations.
 */



if ( ! function_exists( 'rvn_is_portfolio' ) ) :
    /**
     * Is portfolio?
     *
     * @since 1.0.0
     */
    function rvn_is_portfolio()
    {
        return is_page_template( 'template-portfolio.php' );
    }
endif;



if ( ! function_exists( 'rvn_is_portfolio_archive' ) ) :
    /**
     * Is portfolio archive?
     *
     * @since 1.0.0
     */
    function rvn_is_portfolio_archive()
    {
        return ( is_archive() && rvn_is_post_type( 'portfolio' ) );
    }
endif;



if ( ! function_exists( 'rvn_is_portfolio_item' ) ) :
    /**
     * Is portfolio item?
     *
     * @since 1.0.0
     */
    function rvn_is_portfolio_item()
    {
        return is_singular( 'portfolio' );
    }
endif;



if ( ! function_exists( 'rvn_is_post_type' ) ) :
    /**
     * Is post type?
     *
     * @since 1.0.0
     */
    function rvn_is_post_type( $post_type )
    {
        return ( $post_type == get_post_type() );
    }
endif;