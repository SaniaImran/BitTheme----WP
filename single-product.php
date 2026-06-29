<?php
/**
 * Single product template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<main class="site-main single-product-page">
    <div class="woocommerce-content">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();
