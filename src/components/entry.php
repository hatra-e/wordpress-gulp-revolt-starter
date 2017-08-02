<?php
/**
 * Entry Component
 *
 * Outputs default entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php echo rvn_conditional_tag( '<div class="c-entry__featured">', rvn_get_featured_image(), '</div>' ); ?>

    <header class="c-entry__header">
        <?php get_template_part( 'components/_entry', 'title' ); ?>
        <?php get_template_part( 'components/_entry', 'meta' ); ?>
    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->