<?php
/**
 * Entry/Page Component
 *
 * Outputs page entry in page.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="c-entry__featured">
        <?php echo rvn_get_featured_image(); ?>
    </div><!-- /c-entry__featured -->

    <header class="c-entry__header">
        <?php get_template_part( 'components/_entry', 'title' ); ?>
    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->