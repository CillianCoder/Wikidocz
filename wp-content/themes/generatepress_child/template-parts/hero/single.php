<?php
/**
 * Single post hero.
 * Expects: $category (WP_Term|null)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$category = $args['category'] ?? null;
?>
<section class="page-hero">
    <div class="wrap">
        <?php if ( $category ) : ?>
            <span class="tag tag-<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></span>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="visual">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>
    </div>
</section>