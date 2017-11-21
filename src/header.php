<?php
/**
 * Header Template
 *
 * Declares Doctype, includes <head>, opens <body>, includes masthead and
 * page-header.
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <?php get_template_part( 'components/header', 'meta' ); ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class('js-off'); ?>>

    <?php get_template_part( 'components/header', 'svg' ); ?>

    <?php do_action( 'rvn_before_site_begin' ); ?>

    <div class="c-site">

        <?php do_action( 'rvn_after_site_begin' ); ?>

        <!-- REMOVE -->
        <div id="example">
            <b>EXAMPLE CUSTOMIZER COLOR (remove from header.php)</b>
        </div>
        <!-- REMOVE -->

        <header class="c-masthead">
            <div class="o-container">
                <?php get_template_part( 'components/header', 'brand' ); ?>
                <?php get_template_part( 'components/header', 'navbar' ); ?>
            </div><!-- /o-container -->
        </header><!-- /c-masthead -->

        <div class="c-body">
            <?php get_template_part( 'components/page-header' ); ?>
            <div class="o-body">