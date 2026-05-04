<!DOCTYPE html>
<?php require_once __DIR__ . '/wp-stubs.php'; ?>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header layout-<?php echo esc_attr(get_theme_mod('header_layout', 'left')); ?> <?php echo get_theme_mod('header_sticky') ? 'is-sticky' : ''; ?>">

    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <p>
            <?php echo get_theme_mod('announcement_text', 'Welcome to byteTheme!'); ?>
        </p>

        <div class="header-contact">

            <?php if (get_theme_mod('header_email')) : ?>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('header_email')); ?>">
                    <?php echo esc_html(get_theme_mod('header_email')); ?>
                </a>
            <?php endif; ?>

            <?php if (get_theme_mod('header_phone')) : ?>
                <a href="tel:<?php echo esc_attr(get_theme_mod('header_phone')); ?>">
                    <?php echo esc_html(get_theme_mod('header_phone')); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>

    <!-- MAIN HEADER -->
    <div class="header-inner header-container">

     <!-- NAVIGATION -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'menu_class' => 'primary-menu'
            ));
            ?>
        </nav>    

        <!-- LOGO + TAGLINE -->
        <div class="site-branding">

            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php endif; ?>

            <?php if (get_bloginfo('description')) : ?>
                <p class="tagline">
                    <?php bloginfo('description'); ?>
                </p>
            <?php endif; ?>

        </div>

           

    </div>

</header>   