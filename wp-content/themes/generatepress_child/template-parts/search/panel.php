<?php
/**
 * Search filter panel.
 * Expects: $search_url, $order
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$search_url = $args['search_url'] ?? '';
$order      = $args['order'] ?? 'relevance';
?>
<div class="filter-row filter-row--flush">
    <a href="<?php echo esc_url( add_query_arg( 'order', 'relevance', $search_url ) ); ?>" class="tag <?php echo $order === 'relevance' ? 'dark' : 'outline'; ?>">Relevance</a>
    <a href="<?php echo esc_url( add_query_arg( 'order', 'date', $search_url ) ); ?>" class="tag <?php echo $order === 'date' ? 'dark' : 'outline'; ?>">Newest</a>
    <a href="<?php echo esc_url( add_query_arg( 'order', 'popular', $search_url ) ); ?>" class="tag <?php echo $order === 'popular' ? 'dark' : 'outline'; ?>">Popular</a>
</div>