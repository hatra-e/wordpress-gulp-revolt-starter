<?php
/**
 * Footer Template
 *
 * Contains all footer elements and closes <body> and <head>.
 */
?>

    </div><!-- /c-body -->

    <footer class="c-footer" role="contentinfo">
        <div class="o-container">

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="c-footer__nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'depth'          => 1,
                    ) );
                    ?>
                </nav><!-- /c-footer__nav -->
            <?php endif; ?>

        </div><!-- /c-container -->
    </footer><!-- /c-footer -->

    <?php do_action( 'rvn_before_site_end' ); ?>

</div><!-- /c-site -->

<?php do_action( 'rvn_after_site_end' ); ?>

<?php wp_footer(); ?>

</body>

</html>