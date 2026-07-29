<?php
/**
 * Filter row - 4 tabs (newest, popular, editors-picks, medium-read)
 * Used on home.php, category.php
 *
 * Expects: $filter_urls (array), $filter (string current), $base_url (for home)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$filter_urls = $args['filter_urls'] ?? array();
$filter      = $args['filter'] ?? '';
?>
<div class="filter-row">
    <?php if ( ! empty( $filter_urls['newest'] ) ) : ?>
        <a href="<?php echo esc_url( $filter_urls['newest'] ); ?>" class="tag <?php echo $filter !== 'popular' && $filter !== 'editors-picks' && $filter !== 'medium-read' ? 'dark' : 'outline'; ?>">Newest</a>
    <?php endif; ?>
    <?php if ( ! empty( $filter_urls['popular'] ) ) : ?>
        <a href="<?php echo esc_url( $filter_urls['popular'] ); ?>" class="tag <?php echo $filter === 'popular' ? 'dark' : 'outline'; ?>">Popular</a>
    <?php endif; ?>
    <?php if ( ! empty( $filter_urls['editors-picks'] ) ) : ?>
        <a href="<?php echo esc_url( $filter_urls['editors-picks'] ); ?>" class="tag <?php echo $filter === 'editors-picks' ? 'dark' : 'outline'; ?>">Editor's picks</a>
    <?php endif; ?>
    <?php if ( ! empty( $filter_urls['medium-read'] ) ) : ?>
        <a href="<?php echo esc_url( $filter_urls['medium-read'] ); ?>" class="tag <?php echo $filter === 'medium-read' ? 'dark' : 'outline'; ?>">5-10 min reads</a>
    <?php endif; ?>
</div>