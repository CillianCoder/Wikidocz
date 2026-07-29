<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$cat = get_queried_object();
$cat_slug = $cat->slug;
$cat_name = $cat->name;
$cat_desc = category_description();
$cat_url = get_category_link( $cat->term_id );

$filter = isset( $_GET['filter'] ) ? sanitize_key( $_GET['filter'] ) : '';
$has_filter = ! empty( $filter );

$section_title = sprintf( 'Latest in %s', esc_html( $cat_name ) );
$section_desc = 'More articles in this category';
switch ( $filter ) {
    case 'popular':
        $section_title = sprintf( 'Popular in %s', esc_html( $cat_name ) );
        $section_desc = 'Most discussed and engaged content';
        break;
    case 'editors-picks':
        $section_title = "Editor's Picks";
        $section_desc = 'Curated selections from our editors';
        break;
    case 'medium-read':
        $section_title = 'Medium Reads';
        $section_desc = 'Articles that take 5\u201310 minutes to read';
        break;
}

$featured_id = null;
if ( ! $has_filter ) {
    $sticky_ids = get_option( 'sticky_posts' );
    if ( ! empty( $sticky_ids ) ) {
        $sticky_query = new WP_Query( array(
            'category__in' => array( $cat->term_id ),
            'post__in' => $sticky_ids,
            'posts_per_page' => 1,
            'ignore_sticky_posts' => 1,
        ) );
        if ( $sticky_query->have_posts() ) {
            $featured_id = $sticky_query->posts[0]->ID;
        }
    }
    if ( ! $featured_id ) {
        $fallback = new WP_Query( array(
            'category__in' => array( $cat->term_id ),
            'posts_per_page' => 1,
            'ignore_sticky_posts' => 1,
        ) );
        if ( $fallback->have_posts() ) {
            $featured_id = $fallback->posts[0]->ID;
        }
    }
    if ( $featured_id && ! is_paged() ) {
        $post = get_post( $featured_id );
        setup_postdata( $post );
    }
}
?>
<main id="main" class="category-v2">
    <?php do_action( 'generate_before_main_content' ); ?>

    <?php if ( ! is_paged() && ! $has_filter ) : ?>
        <?php
        get_template_part( 'template-parts/hero/full', null, array(
            'title'           => esc_html( $cat_name ),
            'description'     => $cat_desc ? esc_html( wp_strip_all_tags( $cat_desc ) ) : '',
            'filter_urls'     => array(
                'newest'        => $cat_url,
                'popular'       => add_query_arg( 'filter', 'popular', $cat_url ),
                'editors-picks' => add_query_arg( 'filter', 'editors-picks', $cat_url ),
                'medium-read'   => add_query_arg( 'filter', 'medium-read', $cat_url ),
            ),
            'filter'          => $filter,
            'featured_article'=> $featured_id ? get_post( $featured_id ) : null,
            'category_tag'    => array( 'slug' => $cat_slug, 'name' => $cat_name ),
        ) );
        if ( $featured_id ) wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php if ( $has_filter ) : ?>
        <?php
        get_template_part( 'template-parts/hero/compact', null, array(
            'filter_urls' => array(
                'newest'        => $cat_url,
                'popular'       => add_query_arg( 'filter', 'popular', $cat_url ),
                'editors-picks' => add_query_arg( 'filter', 'editors-picks', $cat_url ),
                'medium-read'   => add_query_arg( 'filter', 'medium-read', $cat_url ),
            ),
            'filter' => $filter,
        ) ); ?>
    <?php endif; ?>

    <?php
    $has_remaining = false;
    $skip_featured = $featured_id && ! is_paged() && ! $has_filter;
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            if ( $skip_featured && get_the_ID() === $featured_id ) continue;
            $has_remaining = true;
            break;
        endwhile;
        rewind_posts();
    endif;
    ?>

    <?php if ( $has_remaining ) : ?>
        <section class="section">
            <div class="wrap">
                <?php get_template_part( 'template-parts/section/head', null, array(
                    'title'       => $section_title,
                    'description' => $section_desc,
                    'pagination'  => true,
                ) ); ?>

                <?php get_template_part( 'template-parts/section/grid-four', null, array(
                    'skip_featured' => $skip_featured,
                    'featured_id'   => $featured_id,
                ) ); ?>

                <?php get_template_part( 'template-parts/section/pagination' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php do_action( 'generate_after_main_content' ); ?>
</main>

<?php get_footer(); ?>