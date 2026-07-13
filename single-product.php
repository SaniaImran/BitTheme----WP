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
    <section class="product-hero">
        <div class="product-hero__content">
            <p class="product-hero__eyebrow">Signature fragrance</p>
            <h1><?php the_title(); ?></h1>
            <p>Explore the story behind this piece and bring a lasting scent into your space.</p>
        </div>
    </section>

    <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
        <div class="woocommerce-breadcrumb-wrap">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    <?php endif; ?>

    <div class="woocommerce-content">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();
