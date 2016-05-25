<?php
/**
 * Entry/Link Component
 *
 * Outputs link post format entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="c-entry__header">
        <h1 class="c-entry__title">
            <?php echo rvn_get_featured_link(); ?>
        </h1>
        <?php get_template_part( 'components/_entry', 'meta' ); ?>
    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->