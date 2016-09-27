<?php
/**
 * Index Template
 *
 * This is the most generic template file in a WordPress. It is used to display
 * a page when nothing more specific matches a query. For example, it puts
 * together the home page when no home.php file exists.
 */
?>

<?php get_header(); ?>

<div class="o-container">

    <main class="c-main">

        <?php if ( have_posts() ) : ?>

            <?php while( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'components/entry', get_post_format() ); ?>

            <?php endwhile; ?>

            <?php rvn_put_paginator(); ?>

        <?php else : ?>

            <?php get_template_part( 'components/entry', 'none' ); ?>

        <?php endif; ?>

    </main><!-- /c-main -->

    <?php get_sidebar(); ?>

</div><!-- /o-container -->

<?php get_footer(); ?>