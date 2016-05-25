<?php
/**
 * Entry/Gallery Component
 *
 * Outputs gallery post format entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="c-entry__featured">
        <?php echo rvn_get_featured_gallery_slider(); ?>
    </div><!-- /c-entry__featured -->

    <header class="c-entry__header">
        <?php get_template_part( 'components/_entry', 'title' ); ?>
        <?php get_template_part( 'components/_entry', 'meta' ); ?>
    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->