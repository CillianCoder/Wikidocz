<?php
/**
 * Category tag navigation bar (output after header).
 */
add_action( 'generate_after_header', 'wikidocz_category_tag_nav' );
function wikidocz_category_tag_nav() {
    $menu_items = wp_get_nav_menu_items( 'Nav_top2' );

    if ( empty( $menu_items ) ) {
        return;
    }
    ?>
    <div class="topic-shell">
        <div class="topic-bar">
            <?php foreach ( $menu_items as $item ) : ?>
                <a href="<?php echo esc_url( $item->url ); ?>">
                    <?php echo esc_html( $item->title ); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

/**
 * Sidebar layout override for front/home pages.
 */
add_filter( 'generate_sidebar_layout', function ( $layout ) {
    if ( is_front_page() || is_home() ) {
        return 'no-sidebar';
    }
    return $layout;
} );