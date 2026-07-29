<?php
/**
 * Full hero with title, description, filter row, and optional featured article.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$title           = $args['title'] ?? '';
$description     = $args['description'] ?? '';
$filter_urls     = $args['filter_urls'] ?? array();
$filter          = $args['filter'] ?? '';
$featured_article = $args['featured_article'] ?? null;
$category_tag    = $args['category_tag'] ?? null;
?>
<section class="page-hero">
    <div class="wrap feature-grid">
        <div>
            <?php if ( $category_tag ) : ?>
                <span class="tag tag-<?php echo esc_attr( $category_tag['slug'] ); ?>"><?php echo esc_html( $category_tag['name'] ); ?></span>
            <?php endif; ?>
            <h1><?php echo esc_html( $title ); ?></h1>
            <?php if ( $description ) : ?>
                <p><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
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
        </div>

        <?php if ( $featured_article ) : ?>
            <?php
            $post = $featured_article;
            setup_postdata( $post );
            get_template_part( 'template-parts/card/featured' );
            wp_reset_postdata();
            ?>
        <?php endif; ?>
    </div>
</section>