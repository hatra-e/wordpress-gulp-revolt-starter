<?php
/**
 * Sidebar Functions
 */



if ( ! function_exists( 'rvn_register_sidebars' ) ) :
    /**
     * Register sidebars
     *
     * @wp-hook widgets_init
     * @since 1.0.0
     */
    function rvn_register_sidebars()
    {
        //
        // Primary Sidebar
        //
        register_sidebar( array(
            'name'          => __( 'Primary Sidebar', 'rvn' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="c-widget__title">',
            'after_title'   => '</h3>',
        ) );
    }

    add_action( 'widgets_init', 'rvn_register_sidebars' );
endif;