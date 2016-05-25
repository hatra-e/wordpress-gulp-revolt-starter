<?php
/**
 * Entry/Video Component
 *
 * Outputs quote post format entry.
 */
?>

<?php
$quote       = get_post_meta( get_the_ID(), '_rtpfui_quote', true );
$quote       = "&ldquo;{$quote}&rdquo;";
$source_name = get_post_meta( get_the_ID(), '_rtpfui_quote_source_name', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="c-entry__featured">
        <?php echo rvn_get_featured_image(); ?>
    </div><!-- /c-entry__featured -->

    <header class="c-entry__header">

        <h1 class="c-entry__title">
            <?php if ( is_singular() ): ?>
                <?php echo $quote; ?>
            <?php else: ?>
                <a href="<?php the_permalink(); ?>"
                   title="<?php esc_attr_e( sprintf( __( 'Permalink to %s', 'rvn' ), the_title_attribute( 'echo=0' ) ) ); ?>"
                   rel="bookmark">
                    <?php echo $quote; ?>
                </a>
            <?php endif; ?>
        </h1>

        <cite class="c-entry__sub-title">
            <?php echo $source_name; ?>
        </cite>

        <?php get_template_part( 'components/_entry', 'meta' ); ?>

    </header><!-- /c-entry__header -->

    <?php get_template_part( 'components/_entry', 'content' ); ?>
    <?php get_template_part( 'components/_entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->