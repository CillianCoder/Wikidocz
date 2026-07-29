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
            <div class="search-form-wrap">
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
                <?php get_template_part( 'template-parts/search/panel', null, array(
                    'search_url' => $search_url,
                    'order'      => $order,
                ) ); ?>
                <ul class="note-list">
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
                        <?php get_template_part( 'template-parts/card/wide' ); ?>
                    <?php endwhile; ?>
                    <?php get_template_part( 'template-parts/section/pagination' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>