<?php
/**
 * Register Portfolio Post Type and Taxonomies
 */



if ( ! function_exists( 'rvn_register_portfolio_post_type' ) ) :
    /**
     * Register portfolio post type
     *
     * @wp-hook init
     * @since 1.0
     */
    function rvn_register_portfolio_post_type()
    {
        $labels = apply_filters( 'rvn_portfolio_labels', array(
            'name'               => _x( 'Portfolio', 'post type name', 'rvn' ),
            'singular_name'      => _x( 'Portfolio Item', 'singular post type name', 'rvn' ),
            'add_new'            => _x( 'Add New', 'portfolio', 'rvn' ),
            'add_new_item'       => __( 'Add New Portfolio Item', 'rvn' ),
            'edit_item'          => __( 'Edit Portfolio Item', 'rvn' ),
            'new_item'           => __( 'New Portfolio Item', 'rvn' ),
            'view_item'          => __( 'View Portfolio Item', 'rvn' ),
            'search_items'       => __( 'Search Portfolio', 'rvn' ),
            'not_found'          => __( 'No portfolio items found', 'rvn' ),
            'not_found_in_trash' => __( 'No portfolio items found in trash', 'rvn' ),
            'parent_item_colon'  => '',
        ) );

        $slug = _x( 'portfolio-item', 'URL slug (no spaces or special characters)', 'rvn' );

        $args = apply_filters( 'rvn_portfolio_args', array(
            'labels'              => $labels,
            'public'              => true,
            'show_in_nav_menus'   => false,
            'exclude_from_search' => false,
            'supports'            => array(
                'title',
                'editor',
                'post-formats',
                'thumbnail',
                'revisions',
                'excerpt',
                'comments',
                'author',
                'custom-fields',
            ),
            'menu_position'       => 5,
            'has_archive'         => true,
            'rewrite'             => array(
                'slug'       => $slug,
                'with_front' => false,
            ),
        ) );

        register_post_type( 'portfolio', $args );
    }

    add_action( 'init', 'rvn_register_portfolio_post_type' );
endif;



if ( ! function_exists( 'rvn_register_portfolio_taxonomy' ) ) :
    /**
     * Register portfolio taxonomy
     *
     * @wp-hook init
     * @since 1.0
     */
    function rvn_register_portfolio_taxonomy()
    {
        $labels = apply_filters( 'rvn_portfolio_tax_labels', array(
            'name'                       => _x( 'Portfolio Categories', 'post type name', 'rvn' ),
            'singular_name'              => _x( 'Portfolio Category', 'singular post type name', 'rvn' ),
            'menu_name'                  => __( 'Categories', 'rvn' ),
            'edit_item'                  => __( 'Edit Portfolio Category', 'rvn' ),
            'update_item'                => __( 'Update Portfolio Category', 'rvn' ),
            'add_new_item'               => __( 'Add New Portfolio Category', 'rvn' ),
            'new_item_name'              => __( 'New Portfolio Category Name', 'rvn' ),
            'parent_item'                => __( 'Parent Portfolio Category', 'rvn' ),
            'parent_item_colon'          => __( 'Parent Portfolio Category:', 'rvn' ),
            'all_items'                  => __( 'All Portfolio Categories', 'rvn' ),
            'search_items'               => __( 'Search Portfolio Categories', 'rvn' ),
            'popular_items'              => __( 'Popular Portfolio Categories', 'rvn' ),
            'separate_items_with_commas' => __( 'Separate portfolio categories with commas', 'rvn' ),
            'add_or_remove_items'        => __( 'Add or remove portfolio categories', 'rvn' ),
            'choose_from_most_used'      => __( 'Choose from the most used portfolio categories', 'rvn' ),
            'not_found'                  => __( 'No portfolio category found.', 'rvn' ),
        ) );

        $slug = _x( 'portfolio-category', 'URL slug (no spaces or special characters)', 'rvn' );

        $args = apply_filters( 'rvn_portfolio_tax_args', array(
            'labels'            => $labels,
            'public'            => true,
            'query_var'         => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'         => $slug,
                'hierarchical' => true,
                'with_front'   => false,
            ),
        ) );

        register_taxonomy( 'portfolio-category', 'portfolio', $args );
    }

    add_action( 'init', 'rvn_register_portfolio_taxonomy' );
endif;