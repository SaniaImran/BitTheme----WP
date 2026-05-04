<footer class="site-footer">

   <div class="footer-menus">

    <?php
    if (get_theme_mod('footer_menus_enable', true)) {
        // Display up to 4 footer menus based on customizer selection
        for ($i = 1; $i <= 4; $i++) {
            $menu_id = get_theme_mod("footer_menu_{$i}_select", '');
            
            if (!empty($menu_id)) {
                $menu = wp_get_nav_menu_object($menu_id);
                echo '<div class="footer-menu">';
                if ($menu) {
                    echo '<h3 class="footer-menu-title">' . esc_html($menu->name) . '</h3>';
                }
                wp_nav_menu(array(
                    'menu' => $menu_id,
                    'container' => false,
                    'fallback_cb' => 'wp_page_menu',
                ));
                echo '</div>';
            }
        }
    }
    ?>

</div>

    <div class="footer-bottom">
        <p>
            <?php echo esc_html(get_theme_mod('footer_text', '© 2026 byteTheme')); ?>
        </p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>