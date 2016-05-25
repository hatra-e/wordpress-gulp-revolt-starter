<?php
/**
 * Entry/404 Component
 *
 * Outputs entry with notification when no page could be found.
 */
?>

<article id="post-0" class="c-entry  hentry">

    <header class="c-entry__header">
        <h1 class="c-entry__title">
            <?php _e( "Page Not Found", 'rvn' ); ?>
        </h1>
    </header>

    <div class="c-entry__content">
        <p>
            <?php _e( 'It looks like nothing was found at this location. You could try one of the links below or start a search.', 'rvn' ); ?>
        </p>
    </div><!-- /c-entry__content -->

</article><!-- /c-entry -->