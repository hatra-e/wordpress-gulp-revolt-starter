<?php
/**
 * Sidebar Template
 */
?>

<div class="o-body__sidebar">
    <aside class="c-sidebar">
        <div class="o-container">
            <div class="o-section">

                <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ): ?>

                    <section class="c-widget">
                        <div class="c-widget__content">

                            <a href="<?php echo esc_url( home_url( '/' ) ) . 'wp-admin/widgets.php' ?>">
                                <?php _e( 'Assign Widgets', 'rvn' ); ?>
                            </a>

                        </div>
                    </section><!-- /c-widget -->

                <?php endif; ?>

            </div><!-- /o-section -->
        </div><!-- /o-container -->
    </aside><!-- /c-sidebar -->
</div><!-- /o-body__sidebar -->