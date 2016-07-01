<?php
/**
 * CMB2 Debug URL Filter
 */



if ( ! function_exists( 'rvn_modify_cmb2_assets_url' ) ) :
    /**
     * Change URLs if symlink is used for development.
     *
     * @wp-hook cmb2_meta_box_url
     * @since 1.0.0
     */
    function rvn_modify_cmb2_assets_url( $url ) {
        /*
         * If you use a symlink, the css/js urls may have an odd path stuck in the middle, like:
         * http://SITEURL/wp-content/plugins/Users/jt/Sites/CMB2/cmb2/js/cmb2.js?ver=X.X.X
         * Or something like that.
         *
         * INSTEAD of completely replacing the URL,
         * It is best to do a str_replace. This ensures you only change the url if it's
         * pointing to the broken resource. This ensures that if another version of CMB2
         * is loaded (i.e. in a 3rd part plugin), that their correct URL will load,
         * rather than forcing yours.
         */

        return str_replace(
            '/Users/Ruven/Sites/_github-repos/wordpress-starter/build', // Replace this with your own path.
            '/wp-content/themes/starter',  // Replace this with your own path.
            $url
        );
    }

    add_filter( 'cmb2_meta_box_url', 'rvn_modify_cmb2_assets_url' );
endif;