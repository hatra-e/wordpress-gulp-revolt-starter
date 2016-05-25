<?php
/**
 * Entry Meta Partial
 *
 * Outputs entry meta infos.
 */
?>

<div class="c-entry__meta">
    <?php if ( rvn_is_post_type( 'portfolio' ) ) : ?>
        <?php rvn_put_meta( array( 'portfolio-category') ); ?>
    <?php else : ?>
        <?php rvn_put_meta(); ?>
    <?php endif; ?>
</div><!-- /c-entry__meta -->