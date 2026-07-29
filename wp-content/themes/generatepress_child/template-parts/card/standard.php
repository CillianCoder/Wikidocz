<?php
/**
 * Standard article card.
 * Used in grid-four loop.
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
    <?php
    $cats = get_the_category();
    if ( ! empty( $cats ) ) :
        $cat = $cats[0];
        ?>
        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="tag tag-<?php echo esc_attr( $cat->slug ); ?>">
            <?php echo esc_html( $cat->name ); ?>
        </a>
    <?php endif; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
</article>