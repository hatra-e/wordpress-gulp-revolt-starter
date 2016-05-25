<?php
/**
 * Entry Functions
 *
 * Helper output functions for entries.
 */



if ( ! function_exists( 'rvn_put_meta' ) ) :
    /**
     * Entry meta
     *
     * @since 1.0.0
     */
    function rvn_put_meta( $items = array( 'date', 'author', 'categories' ) )
    {
        $item_array = array();

        foreach ( $items as $item ) :
            switch ( $item ) :

                //
                // Categories
                //
                case 'categories':
                    $item_array[] = get_the_category_list( __( ', ', 'ruventhemes' ) );
                    break;

                //
                // Tags
                //
                case 'tags':
                    $item_array[] = get_the_tag_list( '', __( ', ', 'ruventhemes' ) );
                    break;

                //
                // Date
                //
                case 'date':
                    $item_array[] = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>',
                        esc_url( get_permalink() ),
                        esc_attr( get_the_time() ),
                        esc_attr( get_the_date( 'c' ) ),
                        esc_html( get_the_date() )
                    );
                    break;

                //
                // Author
                //
                case 'author':
                    $item_array[] = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        esc_attr( sprintf( __( 'View all posts by %s', 'ruventhemes' ), get_the_author() ) ),
                        get_the_author()
                    );
                    break;

                //
                // Portfolio Type
                //
                case 'portfolio-category':
                    $terms = get_the_terms( get_the_ID(), 'portfolio-category' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        $type_links = array();
                        foreach ( $terms as $term ) {
                            $term_link = esc_url( get_term_link( $term ) );
                            $term_name = $term->name;
                            $type_links[] = "<a href='$term_link'>$term_name</a>";
                        }

                        $item_array[] = implode( ', ', $type_links );
                    }
                    break;

            endswitch;
        endforeach;

        //
        // Output
        //
        echo implode( " <span class='c-entry__meta-sep'>&bull;</span> ", $item_array );
    }
endif;



if ( ! function_exists( 'rvn_put_page_links' ) ) :
    /**
     * Link pages
     *
     * @since 1.0.0
     */
    function rvn_put_page_links()
    {
        wp_link_pages( array(
            'before' => '<p class="c-entry__page-links">' . __( 'Pages: ', 'rvn' ),
            'after' => '</p>',
        ) );
    }
endif;



if ( ! function_exists( 'rvn_put_entry_tags' ) ) :
    /**
     * Tags
     *
     * @since 1.0.0
     */
    function rvn_put_entry_tags()
    {
        the_tags( '<p class="c-entry__tags">' . __( 'Tags: ', 'rvn' ),
            ', ',
            '</p>'
        );
    }
endif;



if ( ! function_exists( 'rvn_get_featured_image' ) ) :
    /**
     * Featured image
     *
     * @since 1.0.0
     */
    function rvn_get_featured_image()
    {
        $image = get_the_post_thumbnail( null, 'post-thumbnail' );

        if ( is_singular() ) {
            return $image;
        }

        return sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
            esc_url( get_permalink() ),
            esc_attr( sprintf( __( 'Permalink to: "%s"', 'rvn' ), the_title_attribute( 'echo=0' ) ) ),
            $image
        );
    }
endif;



if ( ! function_exists( 'rvn_get_featured_video' ) ):
    /**
     * Featured video
     *
     * @since 1.0.0
     */
    function rvn_get_featured_video()
    {
        $video    = get_post_meta( get_the_ID(), '_rvn_video_oembed', true );
        $oembed   = wp_oembed_get( $video );
        $mp4_file = esc_url( get_post_meta( get_the_ID(), '_rvn_video_mp4_file', true ) );
        $ogv_file = esc_url( get_post_meta( get_the_ID(), '_rvn_video_ogv_file', true ) );
        // $url_type = substr($video, 0, 4);

        // If MP4 or OGV file is found...
        if ( $mp4_file || $ogv_file ) {
            // Get featured image as poster
            $poster_id = get_post_thumbnail_id();
            $poster_src = wp_get_attachment_image_src( $poster_id, 'full' );
            $poster = $poster_src[0];

            $video = wp_video_shortcode( array(
//                'src'    => $video,
                'mp4'    => $mp4_file,
                'ogv'    => $ogv_file,
                'poster' => $poster,
            ) );
        }

        // If oEmbed URL is found...
        elseif ( $oembed ) {
            $video = $oembed;
        }

        return $video;
    }
endif;



if ( ! function_exists( 'rvn_get_featured_audio' ) ) :
    /**
     * Featured audio
     *
     * @since 1.0.0
     */
    function rvn_get_featured_audio()
    {
        $audio    = get_post_meta( get_the_ID(), '_rvn_audio_oembed', true );
        $oembed   = wp_oembed_get( $audio );
        $mp3_file = esc_url( get_post_meta( get_the_ID(), '_rvn_audio_mp3_file', true ) );
        $ogg_file = esc_url( get_post_meta( get_the_ID(), '_rvn_audio_ogg_file', true ) );
        // $url_type = substr($audio, 0, 4);

        // If MP3 or OGG file is found...
        if ( $mp3_file || $ogg_file ) {
            $audio = wp_audio_shortcode( array(
//                'src'      => $audio,
                'mp3'      => $mp3_file,
                'ogg'      => $ogg_file,
                'loop'     => '',
                'autoplay' => '',
                'preload'  => 'true',
            ) );
        }

        // If oEmbed URL is found...
        elseif ( $oembed ) {
            $audio = $oembed;
        }

        return $audio;
    }
endif;



if ( ! function_exists( 'rvn_get_featured_link' ) ) :
    /**
     * Featured link
     *
     * @since 1.0.0
     */
    function rvn_get_featured_link()
    {
        $url = esc_url( get_post_meta( get_the_ID(), '_rvn_link_url', true ) );
//        $domain = parse_url( $url, PHP_URL_HOST );

        if ( ! empty( $url ) ) {
            return sprintf( '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>',
                $url,
                sprintf( __( 'Link to: %s', 'rvn' ), $url ),
                get_the_title()
            );
        }

        return false;
    }
endif;



if ( ! function_exists( 'rvn_get_featured_gallery_slider' ) ) :
    /**
     * Featured gallery slider
     *
     * @since 1.0.0
     */
    function rvn_get_featured_gallery_slider()
    {
        $pattern = get_shortcode_regex();
        $content = get_the_content();
        $output = '';

        // Check for first occurance of gallery shortcode
        if ( preg_match( "/$pattern/s", $content, $match ) && 'gallery' == $match[2] ) {
            //add_filter('shortcode_atts_gallery', 'rvn_modify_gallery_atts');
            //echo do_shortcode_tag($match);

            // Get image IDs from gallery shortcode
            preg_match( '/\[gallery.*ids=.(.*).\]/', $content, $ids );
            $ids = explode( ",", $ids[1] );

            // Output gallery slider markup and images
            $output .= '<div class="flexslider">';
            $output .= '<ul class="slides">';
            foreach ( $ids as $id ) {
                $output .= '<li>' . wp_get_attachment_image( $id, 'gallery-slider' ) . '</li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
        }

        return $output;
    }
endif;
