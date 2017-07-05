<?php
/**
 * Page Template
 */
?>

<?php get_header(); ?>

    <div class="o-body__main">
        <main class="c-main">
            <div class="o-container">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'components/entry', 'page' ); ?>

                    <?php comments_template( '', true ); ?>

                <?php endwhile; ?>

                <?php get_sidebar(); ?>

            </div><!-- /o-container -->
        </main><!-- /c-main -->
    </div><!-- /o-body__main -->

<?php get_footer(); ?>