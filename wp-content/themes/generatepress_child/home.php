<?php
if (!defined('ABSPATH')) exit;

get_header();

$filter = isset($_GET['filter']) ? sanitize_key($_GET['filter']) : '';
$has_filter = !empty($filter);
$articles_url = get_permalink(get_option('page_for_posts'));

$section_title = 'Latest Articles';
$section_desc = 'Explore our newest content';
switch ($filter) {
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
        $section_desc = 'Articles that take 5–10 minutes to read';
        break;
}

$featured_id = null;
if (!$has_filter) {
    $sticky_ids = get_option('sticky_posts');
    if (!empty($sticky_ids)) {
        $sticky_query = new WP_Query(array(
            'post__in' => $sticky_ids,
            'posts_per_page' => 1,
            'ignore_sticky_posts' => 1,
        ));
        if ($sticky_query->have_posts()) {
            $featured_id = $sticky_query->posts[0]->ID;
        }
    }
    if (!$featured_id) {
        $fallback = new WP_Query(array(
            'posts_per_page' => 1,
            'ignore_sticky_posts' => 1,
        ));
        if ($fallback->have_posts()) {
            $featured_id = $fallback->posts[0]->ID;
        }
    }
    if ($featured_id && !is_paged()) {
        $post = get_post($featured_id);
        setup_postdata($post);
    }
}
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <?php if (!is_paged() && !$has_filter) : ?>
    <section class="page-hero">
        <div class="wrap feature-grid">
            <div>
                <h1>Articles</h1>
                <p>Curated insights, guides, and stories across technology, health, finance, and more.</p>
                <div class="filter-row">
                    <a href="<?php echo esc_url($articles_url); ?>" class="tag dark">Newest</a>
                    <a href="<?php echo esc_url(add_query_arg('filter', 'popular', $articles_url)); ?>" class="tag <?php echo $filter === 'popular' ? 'dark' : 'outline'; ?>">Popular</a>
                    <a href="<?php echo esc_url(add_query_arg('filter', 'editors-picks', $articles_url)); ?>" class="tag <?php echo $filter === 'editors-picks' ? 'dark' : 'outline'; ?>">Editor's picks</a>
                    <a href="<?php echo esc_url(add_query_arg('filter', 'medium-read', $articles_url)); ?>" class="tag <?php echo $filter === 'medium-read' ? 'dark' : 'outline'; ?>">5-10 min reads</a>
                </div>
            </div>

            <?php if ($featured_id) : ?>
            <article class="card">
                <div class="thumb">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <span>Featured image</span>
                    <?php endif; ?>
                </div>
                <span class="tag discovery">Featured</span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="meta"><?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
            </article>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($featured_id) wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    if ($has_filter) :
    ?>
    <section class="page-hero" style="padding:40px 0 32px;border-bottom:none;">
        <div class="wrap">
            <div class="filter-row">
                <a href="<?php echo esc_url($articles_url); ?>" class="tag outline">Newest</a>
                <a href="<?php echo esc_url(add_query_arg('filter', 'popular', $articles_url)); ?>" class="tag <?php echo $filter === 'popular' ? 'dark' : 'outline'; ?>">Popular</a>
                <a href="<?php echo esc_url(add_query_arg('filter', 'editors-picks', $articles_url)); ?>" class="tag <?php echo $filter === 'editors-picks' ? 'dark' : 'outline'; ?>">Editor's picks</a>
                <a href="<?php echo esc_url(add_query_arg('filter', 'medium-read', $articles_url)); ?>" class="tag <?php echo $filter === 'medium-read' ? 'dark' : 'outline'; ?>">5-10 min reads</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    $has_remaining = false;
    $skip_featured = $featured_id && !is_paged() && !$has_filter;
    if (have_posts()) :
        while (have_posts()) : the_post();
            if ($skip_featured && get_the_ID() === $featured_id) continue;
            $has_remaining = true;
            break;
        endwhile;
        rewind_posts();
    endif;

    if ($has_remaining) :
    ?>
    <section class="section">
        <div class="wrap">
            <div class="section-head">
                <div>
                    <h2><?php echo esc_html($section_title); ?></h2>
                    <p><?php echo esc_html($section_desc); ?></p>
                </div>
            </div>

            <div class="grid four">
                <?php while (have_posts()) : the_post(); ?>
                    <?php if ($skip_featured && get_the_ID() === $featured_id) continue; ?>
                    <article class="card">
                        <div class="thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <span>Image</span>
                            <?php endif; ?>
                        </div>
                        <?php $cats = get_the_category(); if (!empty($cats)) : ?>
                            <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>" class="tag tag-<?php echo esc_attr($cats[0]->slug); ?>"><?php echo esc_html($cats[0]->name); ?></a>
                        <?php endif; ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="meta"><?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            $total_pages = $wp_query->max_num_pages;
            if ($total_pages > 1) :
            ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'mid_size' => 2,
                    'prev_text' => 'Prev',
                    'next_text' => 'Next',
                ));
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>
