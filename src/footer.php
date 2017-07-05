<?php
/**
 * Footer Template
 *
 * Contains all footer elements and closes <body> and <head>.
 */
?>

        </div><!-- /c-body -->

        <footer class="c-footer">
            <div class="o-container">

                <nav class="c-footer__nav">
                    <?php rvn_put_footer_nav(); ?>
                </nav><!-- /c-footer__nav -->

            </div><!-- /o-container -->
        </footer><!-- /c-footer -->

        <?php do_action( 'rvn_before_site_end' ); ?>

    </div><!-- /c-site -->

    <?php do_action( 'rvn_after_site_end' ); ?>

    <?php wp_footer(); ?>

</body>

</html>