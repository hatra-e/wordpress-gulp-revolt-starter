<?php
/**
 * Header/Brand Component
 *
 * Outputs logo or title of the site.
 */
?>

<?php if ( is_front_page() ) : ?>
    <h1 class="u-sr-only">
        <?php bloginfo( 'name' ); ?>
    </h1>
<?php endif; ?>

<?php if ( has_custom_logo() ) : ?>
    <div class="c-brand  c-brand--image">
        <?php the_custom_logo(); ?>
    </div>
<?php else : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
       class="c-brand  c-brand--text"
       title="<?php bloginfo( 'description' ); ?>">
        <?php bloginfo( 'name' ); ?>
    </a>
<?php endif; ?>