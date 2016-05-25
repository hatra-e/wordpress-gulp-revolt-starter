<?php
/**
 * Customizer Output Helper Class
 */



if ( ! class_exists( 'RVN_Customizer_Output_Helpers' ) ) :
    /**
     * Customizer Output Helper Class
     *
     * @since 1.0
     */
    class RVN_Customizer_Output_Helpers
    {



        /**
         * This will generate a CSS declaration for use in header output. If the
         * setting ($mod_name) has no defined value, the CSS will not be output.
         *
         * @uses get_theme_mod()
         * @param string $property The name of the CSS *property* to modify.
         * @param string $mod_id The name of the 'theme_mod' option to fetch
         * @param string $prefix Optional. Anything that needs to be output before the CSS property
         * @param string $postfix Optional. Anything that needs to be output after the CSS property
         * @since 1.0
         */
        public static function css_d( $property, $mod_id, $prefix = '', $postfix = '' )
        {
            $value = get_theme_mod( $mod_id );

            if ( ! empty( $value ) ) {
                printf( '%s: %s;',
                    $property,
                    $prefix . $value . $postfix
                );
            }
        }



        /**
         * This will generate a CSS rule set for use in header output. If the
         * setting ($mod_name) has no defined value, the CSS will not be output.
         *
         * @uses get_theme_mod()
         * @param string $selector CSS selector
         * @param string $property The name of the CSS *property* to modify
         * @param string $mod_id The name of the 'theme_mod' option to fetch
         * @param string $prefix Optional. Anything that needs to be output before the CSS property
         * @param string $postfix Optional. Anything that needs to be output after the CSS property
         * @since 1.0
         */
        public static function css_r( $selector, $property, $mod_id, $prefix = '', $postfix = '' )
        {
            $value = get_theme_mod( $mod_id );

            if ( ! empty( $value ) ) {
                printf('%s { %s: %s; }',
                    $selector,
                    $property,
                    $prefix . $value . $postfix
                );
            }
        }



    }
endif;