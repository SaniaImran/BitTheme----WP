<?php
/**
 * The template for displaying single products.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
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
    <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <?php endwhile; ?>
</div>
