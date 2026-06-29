<?php
/**
 * The template for displaying product archives
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<main class="site-main archive-product-page">
    <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) {
        echo '<div class="woocommerce-breadcrumb-wrap">';
        woocommerce_breadcrumb();
        echo '</div>';
    }
    ?>

    <div class="shop-layout">
        <aside class="shop-sidebar">
            <div class="shop-widget shop-widget-search">
                <h5>Filter by price</h5>
                <?php if ( function_exists( 'woocommerce_price_filter' ) ) {
                    the_widget( 'WC_Widget_Price_Filter' );
                } else {
                    echo '<p>Use the native WooCommerce price filter widget in the sidebar.</p>';
                }
                ?>
            </div>

            <div class="shop-widget shop-widget-categories">
                <h5>Categories</h5>
                <ul>
                    <?php
                    wp_list_categories(array(
                        'taxonomy' => 'product_cat',
                        'title_li' => '',
                        'show_count' => true,
                        'hide_empty' => true,
                    ));
                    ?>
                </ul>
            </div>
        </aside>

        <div class="shop-main">
            <div class="woocommerce-content">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
