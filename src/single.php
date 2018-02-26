<?php
/**
 * Single Post Template
 */
?>

<?php get_header(); ?>

    <div class="o-body__main">
        <main class="c-main">
            <div class="o-container">
                <div class="o-section">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'components/entry', get_post_format() ); ?>

                        <?php comments_template( '', true ); ?>

                    <?php endwhile; ?>

                </div><!-- /o-section -->
            </div><!-- /o-container -->
        </main><!-- /c-main -->
    </div><!-- /o-body__main -->

    <?php get_sidebar(); ?>

<?php get_footer(); ?>