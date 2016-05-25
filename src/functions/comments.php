<?php
/**
 * Comment Callback Functions
 */



if ( !function_exists( 'rvn_list_comments' ) ) :
    /**
     * Template for comments.
     *
     * Used as a callback by wp_list_comments() for listing the comments.
     *
     * @since 1.0.0
     */
    function rvn_list_comments( $comment, $args, $depth )
    {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class( 'c-comments__list-item' ); ?>>
        <article class="c-comment" id="comment-<?php comment_ID(); ?>">

            <header class="c-comment__header">

                <div class="c-comment__avatar">
                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>

                <div class="c-comment__author vcard">
                    <cite class="fn"><?php comment_author_link(); ?></cite>
                </div>

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <div class="c-comment__status">
                        <?php _e( 'Your comment is awaiting moderation.', 'rvn' ); ?>
                    </div>
                <?php endif; ?>

                <div class="c-comment__meta">
                    <a class="c-comment__datetime" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time pubdate datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( __( '%1$s at %2$s', 'rvn' ), get_comment_date(), get_comment_time() ); ?>
                        </time>
                    </a>
                    <?php edit_comment_link( __( '(Edit)', 'rvn' ), '<span class="c-comment__edit">', '</span>' ); ?>
                </div>

            </header>

            <div class="c-comment__content">
                <?php comment_text(); ?>
            </div>

            <div class="c-comment__reply">
                <?php
                comment_reply_link( array_merge(
                    $args,
                    array(
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    )
                ) );
                ?>
            </div>

        </article>
        <?php
    }
endif;



if ( ! function_exists( 'rvn_list_pings' ) ) :
    /**
     * Template for pings.
     *
     * Used as a callback by wp_list_comments() for listing the pings.
     *
     * @since 1.0.0
     */
    function rvn_list_pings( $comment, $args, $depth )
    {
        $GLOBALS['comment'] = $comment;
        ?>
        <li class="c-pingback">
        <?php comment_author_link(); ?>
        <?php edit_comment_link( __( '(Edit)', 'rvn' ), ' ' ); ?>
        <?php
    }
endif;



if ( !function_exists( 'rvn_comment_form' ) ):
    /**
     * Template for comment form.
     *
     * Outputs the comment form below the comment listings.
     *
     * @since 1.0.0
     */
    function rvn_comment_form()
    {
        global $post, $user_identity;

        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields = array(
            'author' => '<p>' .
                        '<label for="author">' . __( 'Name', 'rvn' ) . ( $req ? '<span class="required"> *</span>' : ' ' ) . '</label> <br />' .
                        '<input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /> ' .
                        '</p>',
            'email'  => '<p>' .
                        '<label for="email">' . __( 'E-Mail', 'rvn' ) . ( $req ? '<span class="required"> *</span>' : ' ' ) . __( '(will not be published)', 'rvn' ) . '</label> <br />' .
                        '<input type="text" id="email" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /> ' .
                        '</p>',
            'url'    => '<p>' .
                        '<label for="url">' . __( 'Website', 'rvn' ) . '</label> <br />' .
                        '<input type="text" id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                        '</p>'
        );

        comment_form( array(
            'class_form'           => 'c-comment-form',
            'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
            'comment_field'        => '<p>' .
                                      '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
                                      '</p>',
            'must_log_in'          => '<p>' .
                                      sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) .
                                      '</p>',
            'logged_in_as'         => '<p>' .
                                      sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) .
                                      '</p>',
            'comment_notes_before' => '',
//            'comment_notes_after'  => '<p class="">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
            'id_form'              => 'comment-form',
            'id_submit'            => 'submit',
            'title_reply'          => __( 'Leave a Reply', 'rvn' ),
            'title_reply_to'       => __( 'Leave a Reply to %s', 'rvn' ),
            'cancel_reply_link'    => __( 'Cancel Reply', 'rvn' ),
            'label_submit'         => __( 'Submit Reply', 'rvn' )
        ) );
    }
endif;