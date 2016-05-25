<?php
/**
 * Entry Title Partial
 *
 * Outputs entry title.
 */
?>

<h1 class="c-entry__title">

    <?php if ( is_singular() ): ?>

        <?php the_title(); ?>

    <?php else: ?>

        <a href="<?php the_permalink(); ?>"
           title="<?php esc_attr_e( sprintf( __( 'Permalink to %s', 'rvn' ), the_title_attribute( 'echo=0' ) ) ); ?>"
           rel="bookmark">
            <?php the_title(); ?>
        </a>

    <?php endif; ?>

</h1>