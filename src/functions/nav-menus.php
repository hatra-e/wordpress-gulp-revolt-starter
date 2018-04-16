<?php
/**
 * Menu/Navbar Functions
 */



if ( ! function_exists( 'rvn_put_nav' ) ) :
    /**
     * Nav
     *
     * @since 1.0.0
     */
    function rvn_put_nav( $args = array() )
    {
        $default_args = array(
            'theme_location' => 'main',
            'depth'          => 3,
            'container'      => false,
            'menu_class'     => 'c-navbar__list',
            'link_before'    => '',
            'link_after'     => '',
        );

        // Override default args.
        $args = array_replace( $default_args, $args );

        // Output nav if assigned.
        if ( has_nav_menu( $args['theme_location'] ) ) {
            wp_nav_menu( $args );
        }
        // If nav is not assigned, output notification.
        else {
            $admin_menu_url = esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php';
            ?>
            <ul>
                <li>
                    <a href="<?php echo $admin_menu_url; ?>">
                        <?php _e( 'Assign a Menu', 'rvn' ); ?>
                    </a>
                </li>
            </ul>
            <?php
        }
    }
endif;