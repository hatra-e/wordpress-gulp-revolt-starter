<?php
/**
 * 404 Template
 */
?>

<?php get_header(); ?>

    <div class="o-body__main">
        <main class="c-main c-main--full-width">
            <div class="o-container">
                <div class="o-section">

                    <?php get_template_part( 'components/entry', '404' ); ?>

                </div><!-- /o-section -->
            </div><!-- /o-container -->
        </main><!-- /c-main -->
    </div><!-- /o-body__main -->

<?php get_footer(); ?>