<?php
/**
 * Related posts grid (4 items).
 * Expects: $post_id
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$post_id = $args['post_id'] ?? get_the_ID();
$categories = get_the_category( $post_id );
if ( empty( $categories ) ) {
    return;
}
$cat = $categories[0];
$query = new WP_Query( array(
    'category__in'        => array( $cat->term_id ),
    'post__not_in'        => array( $post_id ),
    'posts_per_page'      => 4,
    'ignore_sticky_posts' => 1,
) );
if ( ! $query->have_posts() ) {
    return;
}
?>
<section class="section white">
    <div class="wrap">
        <div class="section-head">
            <div>
                <h2>Related articles</h2>
                <p>Continue reading in <?php echo esc_html( $cat->name ); ?></p>
            </div>
            <a class="la-head-btn" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">View all</a>
        </div>
        <div class="grid four">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php get_template_part( 'template-parts/card/standard' ); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();