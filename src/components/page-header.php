<?php
/**
 * Page Header Component
 *
 * Outputs a page header on certain pages above main content.
 */
?>



<?php
$page_header = rvn_get_page_header_array();
$title       = $page_header['title'];
$description = $page_header['description'];
?>

<?php if ( ! empty ( $title ) ): ?>

    <div class="o-container">
        <header class="c-page-header">
            <h1 class="c-page-header__title">
                <?php
                echo $title;
                ?>
            </h1>
            <?php if ( ! empty( $description ) ) : ?>
                <p class="c-page-header__description">
                    <?php echo $description; ?>
                </p>
            <?php endif; ?>
        </header>
    </div><!-- /o-container -->

<?php endif; ?>