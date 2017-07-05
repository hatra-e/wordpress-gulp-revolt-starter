<?php
/**
 * Template Name: Full Width
 */
?>

<?php get_header(); ?>

    <main class="c-main c-main--full-width">
        <div class="o-container">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'components/entry', 'page' ); ?>

                <?php comments_template( '', true ); ?>

            <?php endwhile; ?>

        </div><!-- /o-container -->
    </main><!-- /c-main -->

<?php get_footer(); ?>