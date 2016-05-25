<?php
/**
 * Sidebar Template
 */
?>

<aside class="c-sidebar" role="complementary">

    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ): ?>

        <section class="c-widget">
            <div class="c-widget__content">

                <a href="<?php echo esc_url( home_url( '/' ) ) . 'wp-admin/widgets.php' ?>">
                    <?php _e( 'Assign Widgets', 'rvn' ); ?>
                </a>

            </div>
        </section><!-- /c-widget -->

    <?php endif; ?>

</aside><!-- /c-sidebar -->