
#example {
    /* Method one (pure): */
    /*
    color: <?php echo get_theme_mod('example_color', 'tomato'); ?>;
    */

    /* Method two (CSS declaration): */
    /*
    <?php self::css_d('color', 'example_color', '', ''); ?>
    */
}

/* Method three (CSS ruleset: */
<?php self::css_r('#example', 'color', 'example_color', '', ''); ?>