<?php
/**
 * Entry/Aside Component
 *
 * Outputs aside post format entry.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->