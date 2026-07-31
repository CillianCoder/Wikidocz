<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$filter = isset( $_GET['filter'] ) ? sanitize_key( $_GET['filter'] ) : '';
$has_filter = ! empty( $filter );
$articles_url = get_permalink( get_option( 'page_for_posts' ) );

$section_title = 'Latest Articles';
$section_desc = 'Explore our newest content';
switch ( $filter ) {
    case 'popular':
        $section_title = 'Popular Articles';
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
            'title'           => 'Latest Articles',
            'description'     => 'Explore practical guides, expert tips, and in-depth articles on finance, technology, health, travel, home, education, and lifestyle. Learn useful ideas to improve everyday life.',
            'filter_urls'     => array(
                'newest'        => $articles_url,
                'popular'       => add_query_arg( 'filter', 'popular', $articles_url ),
                'editors-picks' => add_query_arg( 'filter', 'editors-picks', $articles_url ),
                'medium-read'   => add_query_arg( 'filter', 'medium-read', $articles_url ),
            ),
            'filter'          => $filter,
            'featured_article'=> $featured_id ? get_post( $featured_id ) : null,
        ) );
        if ( $featured_id ) wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php if ( $has_filter ) : ?>
        <?php
        get_template_part( 'template-parts/hero/compact', null, array(
            'filter_urls' => array(
                'newest'        => $articles_url,
                'popular'       => add_query_arg( 'filter', 'popular', $articles_url ),
                'editors-picks' => add_query_arg( 'filter', 'editors-picks', $articles_url ),
                'medium-read'   => add_query_arg( 'filter', 'medium-read', $articles_url ),
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