<?php
/**
 * WooCommerce fallback template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<main class="site-main woocommerce-page">
    <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) { ?>
        <div class="woocommerce-breadcrumb-wrap">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    <?php } ?>

    <div class="woocommerce-content">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();
