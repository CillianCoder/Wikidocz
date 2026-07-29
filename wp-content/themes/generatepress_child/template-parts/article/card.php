<?php
/**
 * Article card - standard grid card
 * Runs inside the loop
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<article class="card">
    <div class="thumb">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><span>Image</span></a>
        <?php endif; ?>
    </div>
    <?php $cats = get_the_category(); if ( ! empty( $cats ) ) : ?>
        <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>" class="tag tag-<?php echo esc_attr( $cats[0]->slug ); ?>"><?php echo esc_html( $cats[0]->name ); ?></a>
    <?php endif; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
</article>