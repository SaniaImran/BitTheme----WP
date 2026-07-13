<?php
/**
 * The template for displaying product archives.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>


<?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
    <div class="woocommerce-breadcrumb-wrap">
        <?php woocommerce_breadcrumb(); ?>
    </div>
    
<?php endif; ?>

<div class="shop-layout">
    <aside class="shop-sidebar">
        <div class="shop-widget shop-widget-search">
            <h5>Filter by price</h5>
            <?php if ( function_exists( 'woocommerce_price_filter' ) ) : ?>
                <?php the_widget( 'WC_Widget_Price_Filter' ); ?>
            <?php else : ?>
                <p>Use the native WooCommerce price filter widget in the sidebar.</p>
            <?php endif; ?>
        </div>

        <div class="shop-widget shop-widget-categories">
            <h5>Categories</h5>
            <ul>
                <?php
                wp_list_categories( array(
                    'taxonomy'   => 'product_cat',
                    'title_li'   => '',
                    'show_count' => true,
                    'hide_empty' => true,
                ) );
                ?>
            </ul>
        </div>
    </aside>

    <div class="shop-main">
        <div class="woocommerce-content">
            <?php if ( have_posts() ) : ?>
                <?php do_action( 'woocommerce_before_shop_loop' ); ?>
                <?php woocommerce_product_loop_start(); ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>
                <?php do_action( 'woocommerce_after_shop_loop' ); ?>
            <?php else : ?>
                <?php do_action( 'woocommerce_no_products_found' ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
