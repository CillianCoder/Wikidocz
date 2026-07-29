<?php
/**
 * Template helper functions.
 */

// Reading time calculation.
function wikidocz_read_time() {
    $words = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
    return max( 1, ceil( $words / 200 ) );
}

// Table of contents from content - outputs links.
function wikidocz_toc_from_content( $content ) {
    preg_match_all( '/<h2[^>]*>(.*?)<\/h2>/i', $content, $matches );
    if ( empty( $matches[0] ) ) {
        echo '<p style="color:#64748B;font-size:13px;">No sections yet.</p>';
        return;
    }
    foreach ( $matches[1] as $title ) {
        $clean = wp_strip_all_tags( $title );
        $slug  = sanitize_title( $clean );
        echo '<a href="#' . esc_attr( $slug ) . '">' . esc_html( $clean ) . '</a>';
    }
}