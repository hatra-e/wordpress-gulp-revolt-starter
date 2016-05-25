<?php
/**
 * Entry Content Partial
 *
 * Outputs entry content on singular pages and entry excerpts on index pages.
 */
?>

<?php if ( is_singular() ) : ?>

    <?php do_action( 'rvn_before_content_begin' ); ?>
    <div class="c-entry__content">
        <?php do_action( 'rvn_after_content_begin' ); ?>
        <?php the_content(); ?>
        <?php do_action( 'rvn_before_content_end' ); ?>
    </div><!-- /c-entry__content -->
    <?php do_action( 'rvn_after_content_end' ); ?>

<?php else: ?>

    <?php do_action( 'rvn_before_excerpt_begin' ); ?>
    <div class="c-entry__excerpt">
        <?php do_action( 'rvn_after_excerpt_begin' ); ?>
        <?php the_excerpt(); ?>
        <?php do_action( 'rvn_before_excerpt_end' ); ?>
    </div><!-- /c-entry__excerpt -->
    <?php do_action( 'rvn_after_excerpt_end' ); ?>

<?php endif; ?>