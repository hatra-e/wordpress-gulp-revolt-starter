<?php
/**
 * Template Name: Portfolio
 */
?>

<?php get_header(); ?>

    <main class="c-main c-main--full-width">
        <div class="o-container">

            <?php
        //    global $more;
        //    $more = 0;

            $wp_query = new WP_Query();
            $wp_query->query( array(
                'post_type' => 'portfolio',
                'paged'     => $paged,
            ) );
            ?>

            <?php if ( $wp_query->have_posts() ) : ?>

                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                    <?php get_template_part( 'components/entry', get_post_format() ); ?>

                <?php endwhile; ?>

                <?php rvn_put_paginator(); ?>

            <?php else: ?>

                <?php get_template_part( 'components/entry', 'none' ); ?>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div><!-- /o-container -->
    </main><!-- /c-main -->

<?php get_footer(); ?>