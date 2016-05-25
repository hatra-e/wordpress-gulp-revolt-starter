<?php
/**
 * Menu/Navbar Functions
 */



if ( ! function_exists( 'rvn_put_primary_nav' ) ) :
    /**
     * Primary nav
     *
     * @since 1.0
     */
    function rvn_put_primary_nav()
    {
        // Output primary nav if assigned.
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'depth'          => 3,
                'container'      => false,
                'menu_class'     => '',
                'link_before'    => '',
                'link_after'     => '',
            ));
        }
        // If primary nav is not assigned, output notification.
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