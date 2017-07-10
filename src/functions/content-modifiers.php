<?php
/**
 * Content Modifiers
 *
 * Filters that modify the content before output.
 */



if ( ! function_exists( 'rvn_modify_excerpt_length' ) ) :
    /**
     * Modify excerpt length
     *
     * @wp-hook excerpt_length
     * @param int $length Excerpt length.
     * @return int Modified excerpt length.
     * @since 1.0.0
     */
    function rvn_modify_excerpt_length( $length )
    {
        return 35;
    }

    add_filter( 'excerpt_length', 'rvn_modify_excerpt_length' );
endif;



if ( ! function_exists( 'rvn_modify_excerpt' ) ) :
    /**
     * Modify excerpts
     *
     * Replace [...] with ...
     *
     * @wp-hook wp_trim_excerpt
     * @param string $excerpt
     * @return string Modified excerpt.
     * @since 1.0.0
     */
    function rvn_modify_excerpt( $excerpt )
    {
        return str_replace( '[&hellip;]', '&hellip;', $excerpt );
    }

    add_filter( 'wp_trim_excerpt', 'rvn_modify_excerpt' );
endif;



if ( ! function_exists('rvn_remove_first_gallery_shortcode' ) ) :
    /**
     * Removes first gallery shortcode
     *
     * Removes first occurrence of Gallery shortcode from content, because it is
     * already filtered out with rvn_get_featured_gallery_slider().
     *
     * @wp-hook the_content
     * @param string $content Post content.
     * @return string Modifed $content.
     * @since 1.0.0
     */
    function rvn_remove_first_gallery_shortcode( $content )
    {
        if ( has_post_format( 'gallery' ) && in_array( get_post_type(), array( 'post', 'portfolio', 'gallery' ) ) ) {
            $pattern = get_shortcode_regex();
            preg_match( "/$pattern/s", $content, $match );

            if ( isset($match[2] ) && is_array( $match ) && $match[2] == 'gallery' ) {
                $content = str_replace( $match[0], '', $content );
            }
        }

        return $content;
    }

    add_filter( 'the_content', 'rvn_remove_first_gallery_shortcode' );
endif;



if ( ! function_exists( 'rvn_modify_gallery_atts' ) ):
    /**
     * Modify gallery attributes
     *
     * @wp-hook shortcode_atts_gallery
     * @param array $atts
     * @return array Modified $atts.
     * @since 1.0.0
     */
    function rvn_modify_gallery_atts( $atts )
    {
        if ( has_post_format( 'gallery' ) || $atts['columns'] == 1 ) {
            $atts['size'] = 'post-thumbnail';
        }
        else {
            $atts['size'] = 'gallery-cropped';
        }

        return $atts;
    }

    add_filter( 'shortcode_atts_gallery', 'rvn_modify_gallery_atts' );
endif;



if ( ! function_exists( 'rvn_modify_attachment_link_image_size' ) ):
    /**
     * Modify attachment link
     *
     * Link to 'large' instead of 'full' image size.
     *
     * @wp-hook wp_get_attachment_link
     * @param string $link
     * @param int $post_id
     * @param array $size
     * @param bool $permalink
     * @return string $modified_link
     * @since 1.0.0
     */
    function rvn_modify_attachment_link_image_size( $link, $post_id, $size, $permalink )
    {
        // Only do this if we're getting the file URL
        if ( ! $permalink ) {
            // This returns an array of url, width, height
            $image = wp_get_attachment_image_src( $post_id, 'large' );
            $modified_link = preg_replace( '/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $link );
            return $modified_link;
        }
    }

    add_filter( 'wp_get_attachment_link', 'rvn_modify_attachment_link_image_size', 10, 4 );
endif;