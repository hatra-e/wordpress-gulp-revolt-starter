<?php
/**
 * Entry Footer Partial
 *
 * Outputs entry footer, which consists of page links and tags, on singular
 * entries.
 */
?>

<?php if ( is_singular() ) : ?>

    <footer class="c-entry__footer">
        <?php rvn_put_page_links(); ?>
        <?php rvn_put_entry_tags(); ?>
    </footer><!-- /c-entry__footer -->

<?php endif; ?>