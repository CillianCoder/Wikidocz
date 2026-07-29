<?php
/**
 * Featured article card in hero.
 * Expects: $featured_id
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( empty( $featured_id ) ) return;

$post = get_post( $featured_id );
if ( ! $post ) return;

setup_postdata( $post );
?>
<article class="card">
    <div class="thumb">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large' ); ?>
        <?php else : ?>
            <span>Featured image</span>
        <?php endif; ?>
    </div>
    <span class="tag discovery">Featured</span>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
</article>
<?php
wp_reset_postdata();