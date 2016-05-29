<?php
/**
 * Page Header Component
 *
 * Outputs a page header on certain pages above main content.
 */
?>

<?php if ( is_category() ) : ?>

    <?php
    $category_description = category_description();
    ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Category Archives: %s', 'rvn' ), single_cat_title( '', false ) );
                ?>
            </h1>
            <?php if ( ! empty( $category_description ) ) : ?>
                <p class="c-page-header__description">
                    <?php echo $category_description; ?>
                </p>
            <?php endif; ?>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_tag() ) : ?>

    <?php
    $tag_description = tag_description();
    ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Tag Archives: %s', 'rvn' ), single_tag_title( '', false ) );
                ?>
            </h1>
            <?php if ( ! empty( $tag_description ) ) : ?>
                <p class="c-page-header__description">
                    <?php echo $tag_description; ?>
                </p>
            <?php endif; ?>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_tax() ) : ?>

    <?php
    global $wp_query;
    $term = $wp_query->get_queried_object();
    $term_name = $term->name;
    $term_description = $term->description;
    ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Taxonomy Archives: %s', 'rvn' ), $term_name );
                ?>
            </h1>
            <?php if ( ! empty( $term_description ) ) : ?>
                <p class="c-page-header__description">
                    <?php echo $term_description; ?>
                </p>
            <?php endif; ?>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_author() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                $queried_object = get_queried_object();
                $author_name = $queried_object->display_name;
                printf( __( 'Author Archives: %s', 'rvn' ), $author_name );
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_search() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Search Results for: &ldquo;%s&rdquo;', 'rvn' ), get_search_query() );
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_day() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Daily Archives: %s', 'rvn' ), get_the_date() );
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_month() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Monthly Archives: %s', 'rvn' ), get_the_date( 'F Y' ) );
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( is_year() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                printf( __( 'Yearly Archives: %s', 'rvn' ), get_the_date( 'Y' ) );
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( rvn_is_portfolio() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                the_title();
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php elseif ( rvn_is_portfolio_item() ) : ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                $query = new WP_Query( array(
                    'post_type'  => 'page',
                    'meta_key'   => '_wp_page_template',
                    'meta_value' => 'template-portfolio.php',
                ));

                if ( $query->have_posts() ) {
                    $query->the_post();
                    echo get_the_title( $query->post->ID );
                    wp_reset_query();
                }
                else {
                    _e( 'Portfolio', 'rvn' );
                }
                ?>
            </h1>
        </header>
    </div><!-- /o-container -->

<?php endif; ?>