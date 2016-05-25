<?php
/**
 * Comments Template
 */
?>

<?php
// If the current post is protected by a password and the visitor has not yet
// entered the password we will return early without loading the comments.
if ( post_password_required() ) return;
?>

<?php if ( comments_open() || 0 != get_comments_number() ) : ?>

    <section id="comments" class="c-comments">

        <?php if ( have_comments() ) : ?>

            <?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
                <h2>
                    <?php _e( 'Comments', 'rvn' ); ?>
                </h2>
                <ol class="c-comments__list">
                    <?php
                    wp_list_comments( array(
                        'type'        => 'comment',
                        'callback'    => 'rvn_list_comments',
                        'avatar_size' => '40'
                    ) );
                    ?>
                </ol>
            <?php endif; ?>

            <?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
                <h2>
                    <?php _e( 'Pingbacks', 'rvn' ); ?>
                </h2>
                <ol class="c-comments__list">
                    <?php
                    wp_list_comments( array(
                        'type'     => 'pings',
                        'callback' => 'rvn_list_pings'
                    ) );
                    ?>
                </ol>
            <?php endif; ?>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
                <nav class="c-comments__nav" role="navigation">
                    <div class="">
                        <?php previous_comments_link( __( '&larr; Older Comments', 'rvn' ) ); ?>
                    </div>
                    <div class="">
                        <?php next_comments_link( __( 'Newer Comments &rarr;', 'rvn' ) ); ?>
                    </div>
                </nav>
            <?php endif; ?>

        <?php endif; ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && 0 != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="">
                <?php _e( 'Comments are closed.', 'rvn' ); ?>
            </p>
        <?php endif; ?>

        <?php if ( comments_open() ) : ?>
            <?php rvn_comment_form(); ?>
        <?php endif; ?>

    </section>

<?php endif; ?>