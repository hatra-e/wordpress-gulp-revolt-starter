<?php
/**
 * Add metaboxes to posts to get additional data for post format output.
 */



if ( ! function_exists( 'rvn_add_post_formats_metaboxes' ) ) :
    /**
     * Register post formats meta boxes and fields.
     *
     * @wp-hook cmb2_admin_init
     * @since 1.0
     */
    function rvn_add_post_formats_metaboxes()
    {
        $object_types = array( 'post', 'portfolio' );
        $context      = 'normal';
        $priority     = 'high';


        //
        // Link metabox
        //

        $cmb = new_cmb2_box( array(
            'id'           => 'rvn_link-metabox',
            'title'        => __( 'Link Settings', 'rvn' ),
            'object_types' => $object_types,
            'context'      => $context,
            'priority'     => $priority,
        ) );

        $cmb->add_field( array(
            'name' => __( 'Link URL', 'rvn' ),
            'desc' => __( 'Insert link URL (e.g. "http://ruventhemes.com")', 'rvn' ),
            'id'   => '_rvn_link_url',
            'type' => 'text_url',
            // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        ) );


        //
        // Quote metabox
        //

        $cmb = new_cmb2_box( array(
            'id'           => 'rvn_quote-metabox',
            'title'        => __( 'Quote Settings', 'rvn' ),
            'object_types' => $object_types,
            'context'      => $context,
            'priority'     => $priority,
        ) );

        $cmb->add_field( array(
            'name' => __( 'Quote', 'rvn' ),
            'desc' => '',
            'id'   => '_rvn_quote',
            'type' => 'textarea_small',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Source Name', 'rvn' ),
            'desc' => '',
            'id'   => '_rvn_quote_source_name',
            'type' => 'text_medium',
        ) );


        //
        // Video metabox
        //

        $cmb = new_cmb2_box( array(
            'id'           => 'rvn_video-metabox',
            'title'        => __( 'Video Settings', 'rvn' ),
            'object_types' => $object_types,
            'context'      => $context,
            'priority'     => $priority,
        ) );

        $cmb->add_field( array(
            'name' => __( 'Embed Code or oEmbed URL', 'rvn' ),
            'desc' => '',
            'id'   => '_rvn_video_oembed',
            'type' => 'textarea_code',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Self Hosted MP4 File', 'rvn' ),
            'desc' => __( 'MP4 files are supported by Chrome, Safari and IE9+.', 'rvn' ),
            'id'   => '_rvn_video_mp4_file',
            'type' => 'file',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Self Hosted OGV File', 'rvn' ),
            'desc' => __( 'OGV Files are supported by Firefox and Opera.', 'rvn' ),
            'id'   => '_rvn_video_ogv_file',
            'type' => 'file',
        ) );


        //
        // Audio metabox
        //

        $cmb = new_cmb2_box( array(
            'id'           => 'rvn_audio-metabox',
            'title'        => __( 'Audio Settings', 'rvn' ),
            'object_types' => $object_types,
            'context'      => $context,
            'priority'     => $priority,
        ) );

        $cmb->add_field( array(
            'name' => __( 'Embed Code or oEmbed URL', 'rvn' ),
            'desc' => '',
            'id'   => '_rvn_audio_oembed',
            'type' => 'textarea_code',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Self Hosted MP3 File', 'rvn' ),
            'desc' => __( 'MP3 files are supported by Chrome, Safari and IE9+.', 'rvn' ),
            'id'   => '_rvn_audio_mp3_file',
            'type' => 'file',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Self Hosted OGG File', 'rvn' ),
            'desc' => __( 'OGG Files are supported by Chrome, Firefox and Opera.', 'rvn' ),
            'id'   => '_rvn_audio_ogg_file',
            'type' => 'file',
        ) );

    }

    add_action( 'cmb2_admin_init', 'rvn_add_post_formats_metaboxes' );
endif;