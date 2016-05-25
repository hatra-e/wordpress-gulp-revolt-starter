<?php
/**
 * Entry/Image Component
 *
 * Outputs image post format entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="c-entry__featured">
        <?php echo rvn_get_featured_image(); ?>
    </div><!-- /c-entry__featured -->

    <header class="c-entry__header">
        <?php get_template_part( 'components/_entry', 'title' ); ?>
        <?php if ( is_singular() ) : ?>
            <?php get_template_part( 'components/_entry', 'meta' ); ?>
        <?php endif; ?>
    </header><!-- /c-entry__header -->

    <?php if ( is_singular() ) : ?>
        <?php get_template_part( 'components/_entry', 'content' ); ?>
        <?php get_template_part( 'components/_entry', 'footer' ); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->