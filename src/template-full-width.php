<?php
/**
 * Template Name: Full Width
 */
?>

<?php get_header(); ?>

<div class="o-container">

    <main class="c-main c-main--full-width">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'components/entry', 'page' ); ?>

            <?php comments_template( '', true ); ?>

        <?php endwhile; ?>

    </main><!-- /c-main -->

</div><!-- /o-container -->

<?php get_footer(); ?>