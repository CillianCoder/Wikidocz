<?php
if (!defined('ABSPATH')) exit;

get_header();

$query_str = get_search_query();
$found = $wp_query->found_posts;
$search_url = home_url('/') . '?s=' . urlencode($query_str);
$order = isset($_GET['order']) ? sanitize_key($_GET['order']) : 'relevance';
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <section class="page-hero">
        <div class="wrap">
            <h1>Find clear explainers faster</h1>
            <p>Search across all our articles. Results sorted by relevance.</p>
            <div class="form" style="max-width:760px;margin-top:24px;">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input class="field" type="search" name="s" value="<?php echo esc_attr($query_str); ?>" aria-label="Search">
                </form>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap search-shell">
            <aside class="filter-panel">
                <h3>Filter results</h3>
                <div class="filter-row" style="margin-top:0;">
                    <a href="<?php echo esc_url(add_query_arg('order', 'relevance', $search_url)); ?>" class="tag <?php echo $order === 'relevance' ? 'dark' : 'outline'; ?>">Relevance</a>
                    <a href="<?php echo esc_url(add_query_arg('order', 'date', $search_url)); ?>" class="tag <?php echo $order === 'date' ? 'dark' : 'outline'; ?>">Newest</a>
                    <a href="<?php echo esc_url(add_query_arg('order', 'popular', $search_url)); ?>" class="tag <?php echo $order === 'popular' ? 'dark' : 'outline'; ?>">Popular</a>
                </div>
                <ul class="note-list" style="margin-top:20px;">
                    <li>Category: All</li>
                    <li>Read time: Any length</li>
                    <li>Content type: Articles</li>
                </ul>
            </aside>
            <div>
                <div class="section-head">
                    <div>
                        <h2>Search results</h2>
                        <p>
                            <?php if ($found > 0) : ?>
                                Showing <?php echo $found; ?> result<?php echo $found !== 1 ? 's' : ''; ?> for &ldquo;<?php echo esc_html($query_str); ?>&rdquo;.
                            <?php else : ?>
                                No results for &ldquo;<?php echo esc_html($query_str); ?>&rdquo;.
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <article class="wide-card">
                        <div class="thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('style' => 'width:100%;height:100%;object-fit:cover;border-radius:8px;')); ?>
                            <?php else : ?>
                                <span>Result image</span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php $cats = get_the_category(); if (!empty($cats)) : ?>
                                <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>" class="tag tag-<?php echo esc_attr($cats[0]->slug); ?>"><?php echo esc_html($cats[0]->name); ?></a>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                            <p class="meta"><?php the_author(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
                        </div>
                    </article>
                    <?php endwhile; ?>

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

                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>
