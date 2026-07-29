<?php
/**
 * Query filters: archive posts per page, category filters, search ordering.
 */
add_action( 'pre_get_posts', 'wikidocz_archive_posts_per_page' );
function wikidocz_archive_posts_per_page( $query ) {
    if ( $query->is_main_query() ) {
        if ( $query->is_category() || $query->is_home() ) {
            $query->set( 'posts_per_page', 13 );
        }
        if ( $query->is_search() ) {
            $query->set( 'posts_per_page', 6 );
        }
    }
}

add_action( 'pre_get_posts', 'wikidocz_archive_filters' );
function wikidocz_archive_filters( $query ) {
    if ( ! $query->is_main_query() || ! ( $query->is_home() || $query->is_category() ) ) {
        return;
    }
    $filter = isset( $_GET['filter'] ) ? sanitize_key( $_GET['filter'] ) : '';
    if ( empty( $filter ) ) {
        return;
    }
    switch ( $filter ) {
        case 'popular':
            $query->set( 'orderby', 'comment_count' );
            $query->set( 'order', 'DESC' );
            break;
        case 'editors-picks':
            $query->set( 'tag', 'editor-pick' );
            break;
        case 'medium-read':
            add_action( 'posts_where', 'wikidocz_medium_read_where' );
            break;
    }
}

function wikidocz_medium_read_where( $where ) {
    remove_action( 'posts_where', 'wikidocz_medium_read_where' );
    global $wpdb;
    $where .= " AND LENGTH({$wpdb->posts}.post_content) BETWEEN 5000 AND 10000";
    return $where;
}

add_action( 'pre_get_posts', 'wikidocz_search_order' );
function wikidocz_search_order( $query ) {
    if ( ! $query->is_main_query() || ! $query->is_search() ) {
        return;
    }
    $order = isset( $_GET['order'] ) ? sanitize_key( $_GET['order'] ) : '';
    if ( empty( $order ) ) {
        return;
    }
    switch ( $order ) {
        case 'date':
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'DESC' );
            break;
        case 'popular':
            $query->set( 'orderby', 'comment_count' );
            $query->set( 'order', 'DESC' );
            break;
    }
}

/**
 * Content filters.
 */
add_filter( 'the_content', 'wikidocz_add_heading_ids' );
function wikidocz_add_heading_ids( $content ) {
    return preg_replace_callback(
        '/<h2([^>]*)>(.*?)<\/h2>/i',
        function ( $m ) {
            $title = wp_strip_all_tags( $m[2] );
            $slug  = sanitize_title( $title );
            if ( strpos( $m[1], 'id=' ) === false ) {
                return '<h2 id="' . esc_attr( $slug ) . '"' . $m[1] . '>' . $m[2] . '</h2>';
            }
            return $m[0];
        },
        $content
    );
}