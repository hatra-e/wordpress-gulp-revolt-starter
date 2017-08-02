<?php
/**
 * Helper Functions
 */



if ( ! function_exists( 'rvn_conditional_tag' ) ) :
    /**
     * Conditional tag
     *
     * Only output $value, surrounded by $prefix and $suffix, if $value is not
     * empty or false.
     *
     * @since 1.0.0
     */
    function rvn_conditional_tag( $prefix, $value, $suffix )
    {
        if ( ! empty( $value ) ) {
            return $prefix . $value . $suffix;
        }

        return false;
    }
endif;