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
    <section class="shop-hero">
        <div class="shop-hero__content">
            <p class="shop-hero__eyebrow">Curated essentials</p>
            <h1><?php woocommerce_page_title(); ?></h1>
            <p>Discover refined candles, oils, and home fragrance pieces crafted to bring calm and warmth into everyday rituals.</p>
        </div>
    </section>

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
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
