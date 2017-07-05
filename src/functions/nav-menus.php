<?php
/**
 * Menu/Navbar Functions
 */



if ( ! function_exists( 'rvn_put_main_nav' ) ) :
    /**
     * Main nav
     *
     * @since 1.0.0
     */
    function rvn_put_main_nav()
    {
        // Output primary nav if assigned.
        if ( has_nav_menu( 'main' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'main',
                'depth'          => 3,
                'container'      => false,
                'menu_class'     => 'c-navbar__list  js-main-menu',
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



if ( ! function_exists( 'rvn_put_footer_nav' ) ) :
    /**
     * Footer nav
     *
     * @since 1.0.0
     */
    function rvn_put_footer_nav()
    {
        // Output primary nav if assigned.
        if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'depth'          => 1,
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