<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oyanova
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Inter-SemiBold.woff2" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Inter-Regular.woff2" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Inter-MediumItalic.woff2"
        as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Inter-Medium.woff2" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/GoodTimesRg-Regular.woff2"
        as="font" type="font/woff2" crossorigin>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <header id="masthead" class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="header-menu">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" type="button" name="Hamburger Menu"
                                    aria-controls="site-navigation" aria-expanded="false">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <div class="header-mobile-menu for-des">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'header-menu-left',
                                            'menu_id'        => 'header-menu-left',
                                        )
                                    ); ?>
                                </div>
                                <div class="header-mobile-menu for-mob">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'header-mobile-menu',
                                            'menu_id'        => 'primary-menu',
                                        )
                                    ); ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="site-branding">
                            <?php the_custom_logo(); ?>
                        </div>
                    </div>
                    <div class="col-lg-5 align-self-center">
                        <div class="main-navigation main-navigation-right">
                            <div class="header-mobile-menu header-mobile-menu-right for-des">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'header-menu-right',
                                        'menu_id'        => 'header-menu-right',
                                    )
                                ); ?>
                            </div>
                            <?php
                            $header_button_text    = get_field("header_button_text", "option");
                            $header_button_link    = (get_field("header_button_link", "option")) ? get_field("header_button_link", "option") : "javascript:void(0);";
                            if (!empty($header_button_text)) { ?>
                                <div class="header-btn">
                                    <a href="<?php echo esc_attr($header_button_link); ?>" class="sec-btn"
                                        title="<?php echo esc_attr(ucfirst(strtolower($header_button_text))); ?>"><span><?php echo esc_html($header_button_text); ?></span></a>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
		<div id="popupNewsletter" style="opacity: 0; visibility: hidden;position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);z-index: 1000;transition: opacity 0.5s, transform 0.5s, visibility 0.5s;">
		  <button onclick="closePopup()" style="
			background: rgb(0 0 0 / 100%);
			color: white;
			border: none;
			padding: 5px 8px;
		">X</button>
		<?php echo do_shortcode('[convertkit form=7013093]'); ?>
		</div>
		<div id="popup-overlay" style="opacity: 0; visibility: hidden; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; transition: opacity 0.5s, visibility 0.5s;"></div>