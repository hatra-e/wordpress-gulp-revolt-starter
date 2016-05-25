<?php
/**
 * Page Template
 */
?>

<?php get_header(); ?>

<div class="o-container">

    <main class="c-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'components/entry', 'page' ); ?>

            <?php comments_template( '', true ); ?>

        <?php endwhile; ?>

    </main><!-- /c-main -->

    <?php get_sidebar(); ?>

</div   ><!-- /o-container -->

<?php get_footer(); ?>