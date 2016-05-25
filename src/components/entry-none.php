<?php
/**
 * Entry/None Component
 *
 * Outputs entry with notification when no entry was found in loop.
 */
?>

<article id="post-0" class="c-entry  hentry">

    <header class="c-entry__header">
        <h1 class="c-entry__title">
            <?php _e( 'Nothing Found', 'rvn' ); ?>
        </h1>
    </header>

    <div class="c-entry__content">

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

            <p>
                <?php
                printf( __( "Ready to publish your first post? <a href='%1$s'>Get started here</a>.", 'rvn' ),
                        admin_url( 'post-new.php' )
                );
                ?>
            </p>

        <?php elseif ( is_search() ): ?>

            <p>
                <?php _e( "Sorry, but this search term did not match any results. Please try again with different keywords.", 'rvn' ); ?>
            </p>
            <p>
                <?php get_search_form(); ?>
            </p>

        <?php else: ?>

            <p>
                <?php _e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'rvn' ); ?>
            </p>
            <p>
                <?php get_search_form(); ?>
            </p>

        <?php endif; ?>

    </div><!-- /c-entry__content -->

</article><!-- /c-entry -->