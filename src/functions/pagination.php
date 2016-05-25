<?php
/**
 * Pagination Functions
 */



if ( ! function_exists( 'rvn_put_paginator' ) ) :
    /**
     * Paginator
     *
     * @since 1.0.0
     */
    function rvn_put_paginator()
    {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) {
            ?>
            <nav class="c-paginator">
                <div class="c-paginator__prev">
                    <?php next_posts_link( __( "<span class='meta-nav'>&laquo;</span> Older posts", 'rvn' ) ); ?>
                </div>
                <div class="c-paginator__next">
                    <?php previous_posts_link( __( "Newer posts <span class='meta-nav'>&raquo;</span>", 'rvn' ) ); ?>
                </div>
            </nav>
            <?php
        }
    }
endif;