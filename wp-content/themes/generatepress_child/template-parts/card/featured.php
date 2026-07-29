<?php
/**
 * Featured card in hero.
 * Runs inside loop - post data already set up.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<article class="card">
    <div class="thumb">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><span>Featured image</span></a>
        <?php endif; ?>
    </div>
    <span class="tag discovery">Featured</span>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
</article>