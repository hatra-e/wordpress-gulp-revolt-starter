<?php
/**
 * Customizer CSS Output
 */



if ( ! class_exists( 'RVN_Customizer_Output' ) ) :
    /**
     * Renders the customizer CSS code.
     *
     * @wp-hook wp_head
     * @since 1.0
     */
    class RVN_Customizer_Output extends RVN_Customizer_Output_Helpers
    {



        /**
         * Renders the customizer CSS code.
         *
         * @since 1.0
         */
        public static function render_css()
        {
            ?>
            <!-- BEGIN Customizer CSS -->
            <style type="text/css">
                <?php
                require( 'output/example.css.php' );
                ?>
            </style>
            <!-- END Customizer CSS -->
            <?php
        }



    }

    add_action( 'wp_head', array( 'RVN_Customizer_Output', 'render_css' ) );
endif;








