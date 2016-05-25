<?php
/**
 * Entry/Video Component
 *
 * Outputs video post format entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="c-entry__featured">
        <?php echo rvn_get_featured_video(); ?>
    </div><!-- /c-entry__featured -->

    <header class="c-entry__header">
        <?php get_template_part( 'components/_entry', 'title' ); ?>
        <?php get_template_part( 'components/_entry', 'meta' ); ?>
    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->