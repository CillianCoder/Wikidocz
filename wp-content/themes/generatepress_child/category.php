<?php
if (!defined('ABSPATH')) exit;

get_header();

$cat = get_queried_object();
$cat_slug = $cat->slug;
$cat_name = $cat->name;
$cat_desc = category_description();

$featured_id = null;
$sticky_ids = get_option('sticky_posts');

if (!empty($sticky_ids)) {
    $sticky_query = new WP_Query(array(
        'category__in' => array($cat->term_id),
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
        'category__in' => array($cat->term_id),
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

function cat_read_time($pid = null) {
    if (!$pid) $pid = get_the_ID();
    $words = str_word_count(wp_strip_all_tags(get_post_field('post_content', $pid)));
    return max(1, ceil($words / 200)) . ' min read';
}
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <?php if (!is_paged()) : ?>
    <section class="page-hero">
        <div class="wrap feature-grid">
            <div>
                <span class="tag tag-<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($cat_name); ?></span>
                <h1><?php echo esc_html($cat_name); ?></h1>
                <?php if ($cat_desc) : ?>
                    <p><?php echo wp_kses_post($cat_desc); ?></p>
                <?php endif; ?>
                <div class="filter-row">
                    <span class="tag dark">Newest</span>
                    <span class="tag dark">Popular</span>
                    <span class="tag dark">Editor's picks</span>
                    <span class="tag dark">5-10 min reads</span>
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
                <p class="meta"><?php echo get_the_date(); ?> &middot; <?php echo cat_read_time(); ?></p>
            </article>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($featured_id) wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $has_remaining = false;
    $skip_featured = $featured_id && !is_paged();
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
                    <h2><?php printf('Latest in %s', esc_html($cat_name)); ?></h2>
                    <p>More articles in this category</p>
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
                        <span class="tag tag-<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($cat_name); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="meta"><?php echo get_the_date(); ?> &middot; <?php echo cat_read_time(); ?></p>
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
