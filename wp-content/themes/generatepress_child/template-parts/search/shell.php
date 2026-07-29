<?php
/**
 * Search shell: filter panel + results container.
 * Used on search.php
 *
 * Expects: $query_str, $found, $search_url, $order
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="wrap search-shell">
    <?php get_template_part( 'template-parts/search/panel', null, array(
        'search_url' => $search_url,
        'order'      => $order,
    ) ); ?>
    <div>
        <?php get_template_part( 'template-parts/section/head', null, array(
            'title' => 'Search results',
            'description' => $found > 0
                ? sprintf( 'Showing %d result%s for &ldquo;%s&rdquo;.', $found, $found !== 1 ? 's' : '', esc_html( $query_str ) )
                : sprintf( 'No results for &ldquo;%s&rdquo;.', esc_html( $query_str ) ),
        ) ); ?>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/article/wide-card' ); ?>
            <?php endwhile; ?>

            <?php get_template_part( 'template-parts/section/pagination' ); ?>
        <?php endif; ?>
    </div>
</div>