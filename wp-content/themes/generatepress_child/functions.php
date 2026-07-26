<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

add_filter( 'generate_sidebar_layout', function( $layout ) {
    if ( is_front_page() || is_home() ) {
        return 'no-sidebar';
    }
    return $layout;
} );

add_action( 'generate_after_header', 'wikidocz_category_tag_nav' );
function wikidocz_category_tag_nav() {
    $menu_items = wp_get_nav_menu_items( 'Nav_top2' );

    if ( empty( $menu_items ) ) return;
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

// Register the Featured Categories Shortcode
add_shortcode('wikidocz_featured_categories', 'wikidocz_featured_categories_shortcode');
function wikidocz_featured_categories_shortcode($atts) {
    ob_start();
    ?>
    <div class="fc-wrapper">
        <div class="section-head" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 36px; gap: 24px; flex-wrap: wrap;">
            <div>
                <h2 style="font-family: Poppins, sans-serif; font-size: 34px; font-weight: 700; margin: 0 0 10px; color: #0D1B2A; line-height: 1.2;">Featured Categories</h2>
                <p style="font-family: Montserrat, sans-serif; font-size: 16px; color: #526173; margin: 0;">Explore curated content across the topics that matter most.</p>
            </div>
        </div>
        <div class="fc-grid">
            
            <a class="fc-card" href="/category/entertainment/" style="--fc-bg:#FFF1F2;--fc-accent:#E11D48;--fc-glow:rgba(225,29,72,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/><line x1="17" y1="17" x2="22" y2="17"/></svg>
                </div>
                <h3 class="fc-name">Entertainment</h3>
            </a>

            <a class="fc-card" href="/category/technology/" style="--fc-bg:#E0F2FE;--fc-accent:#0284C7;--fc-glow:rgba(2,132,199,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>
                </div>
                <h3 class="fc-name">Technology</h3>
            </a>

            <a class="fc-card" href="/category/health/" style="--fc-bg:#F0FDF4;--fc-accent:#16A34A;--fc-glow:rgba(22,163,74,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/><path d="M3.5 12h3l2 -3 3 6 2 -3h3.5"/></svg>
                </div>
                <h3 class="fc-name">Health</h3>
            </a>

            <a class="fc-card" href="/category/finance/" style="--fc-bg:#FFF7ED;--fc-accent:#EA580C;--fc-glow:rgba(234,88,12,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <h3 class="fc-name">Finance</h3>
            </a>

            <a class="fc-card" href="/category/home/" style="--fc-bg:#FDF4FF;--fc-accent:#A855F7;--fc-glow:rgba(168,85,247,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </div>
                <h3 class="fc-name">Home</h3>
            </a>

            <a class="fc-card" href="/category/travel/" style="--fc-bg:#DDF9F9;--fc-accent:#0EA5A8;--fc-glow:rgba(14,165,168,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <h3 class="fc-name">Travel</h3>
            </a>

            <a class="fc-card" href="/category/learning/" style="--fc-bg:#FFF4DA;--fc-accent:#B45309;--fc-glow:rgba(180,83,9,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="8" y1="7" x2="16" y2="7"/><line x1="8" y1="11" x2="13" y2="11"/></svg>
                </div>
                <h3 class="fc-name">Learning</h3>
            </a>

            <a class="fc-card" href="/category/lifestyle/" style="--fc-bg:#F0F4FF;--fc-accent:#4F46E5;--fc-glow:rgba(79,70,229,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
                </div>
                <h3 class="fc-name">Lifestyle</h3>
            </a>

        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_action('pre_get_posts', 'wikidocz_archive_posts_per_page');
function wikidocz_archive_posts_per_page($query) {
    if ($query->is_main_query()) {
        if ($query->is_category() || $query->is_home()) {
            $query->set('posts_per_page', 13);
        }
    }
}

add_action('pre_get_posts', 'wikidocz_archive_filters');
function wikidocz_archive_filters($query) {
    if (!$query->is_main_query() || !($query->is_home() || $query->is_category())) return;
    $filter = isset($_GET['filter']) ? sanitize_key($_GET['filter']) : '';
    if (empty($filter)) return;
    switch ($filter) {
        case 'popular':
            $query->set('orderby', 'comment_count');
            $query->set('order', 'DESC');
            break;
        case 'editors-picks':
            $query->set('tag', 'editor-pick');
            break;
        case 'medium-read':
            add_action('posts_where', 'wikidocz_medium_read_where');
            break;
    }
}

function wikidocz_medium_read_where($where) {
    remove_action('posts_where', 'wikidocz_medium_read_where');
    global $wpdb;
    $where .= " AND LENGTH({$wpdb->posts}.post_content) BETWEEN 5000 AND 10000";
    return $where;
}

add_shortcode( 'hero_content', function( $atts ) {
    $a = shortcode_atts( [ 'post_id' => 0 ], $atts );
    $args = $a['post_id']
        ? [ 'p' => $a['post_id'], 'posts_per_page' => 1, 'post_type' => 'post' ]
        : [ 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' ];
    $query = new WP_Query( $args );
    if ( ! $query->have_posts() ) {
        return '<p style="color:#C8D4E3">No articles yet.</p>';
    }
    $query->the_post();
    $categories = get_the_category();
    $cat_tag    = '';
    if ( ! empty( $categories ) ) {
        $cat_id = $categories[0]->term_id;
        $bg     = get_term_meta( $cat_id, 'cat_color', true ) ?: '#FFF4DA';
        $text   = get_term_meta( $cat_id, 'cat_text_color', true ) ?: '#B45309';
        $cat_tag = sprintf(
            '<a href="%s" class="hero-cat-link" style="background:%s;color:%s">%s</a>',
            esc_url( get_category_link( $cat_id ) ),
            esc_attr( $bg ),
            esc_attr( $text ),
            esc_html( $categories[0]->name )
        );
    }
    $output = sprintf(
        '<div class="hero-cat">%s</div>
         <h1 class="hero-title"><a href="%s">%s</a></h1>
         <div class="hero-excerpt">%s</div>
         <div class="hero-actions">
           <a class="hero-btn" href="%s">Start reading</a>
           <a class="hero-btn hero-btn-secondary" href="#fc-grid">Explore topics</a>
         </div>',
        $cat_tag,
        esc_url( get_permalink() ),
        esc_html( get_the_title() ),
        wp_trim_words( get_the_excerpt(), 55, '...' ),
        esc_url( get_permalink() )
    );
    wp_reset_postdata();
    return $output;
} );

add_shortcode( 'hero_image', function( $atts ) {
    $a = shortcode_atts( [ 'post_id' => 0 ], $atts );
    $args = $a['post_id']
        ? [ 'p' => $a['post_id'], 'posts_per_page' => 1, 'post_type' => 'post' ]
        : [ 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' ];
    $query = new WP_Query( $args );
    if ( ! $query->have_posts() ) {
        return '<div class="hero-image-fallback">Featured image</div>';
    }
    $query->the_post();
    if ( has_post_thumbnail() ) {
        $output = '<div class="hero-image-wrap">' . get_the_post_thumbnail( get_the_ID(), 'large', [ 'class' => 'hero-img' ] ) . '</div>';
    } else {
        $output = '<div class="hero-image-fallback">Featured image</div>';
    }
    wp_reset_postdata();
    return $output;
} );

// Reading time
function wikidocz_read_time() {
    $words = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
    return max( 1, ceil( $words / 200 ) );
}

// Add ID attributes to H2s in content for TOC linking
add_filter( 'the_content', 'wikidocz_add_heading_ids' );
function wikidocz_add_heading_ids( $content ) {
    return preg_replace_callback(
        '/<h2([^>]*)>(.*?)<\/h2>/i',
        function( $m ) {
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

// Table of contents from content
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

// Related posts sidebar list
function wikidocz_related_posts_list( $post_id ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) return;
    $query = new WP_Query( array(
        'category__in'        => array( $categories[0]->term_id ),
        'post__not_in'        => array( $post_id ),
        'posts_per_page'      => 3,
        'ignore_sticky_posts' => 1,
    ) );
    if ( ! $query->have_posts() ) {
        echo '<div class="panel"><h3>Related</h3><p style="color:#64748B;font-size:13px;">No related articles.</p></div>';
        return;
    }
    echo '<div class="panel"><h3>Related</h3>';
    while ( $query->have_posts() ) {
        $query->the_post();
        echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
    }
    echo '</div>';
    wp_reset_postdata();
}

// Related posts grid (4-column, 2 rows)
function wikidocz_related_posts_grid( $post_id ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) return;
    $cat = $categories[0];
    $query = new WP_Query( array(
        'category__in'        => array( $cat->term_id ),
        'post__not_in'        => array( $post_id ),
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => 1,
    ) );
    if ( ! $query->have_posts() ) return;
    ?>
    <section class="section white">
        <div class="wrap">
            <div class="section-head">
                <div>
                    <h2>Related articles</h2>
                    <p>Continue reading in <?php echo esc_html( $cat->name ); ?></p>
                </div>
                <a class="la-head-btn" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">View all</a>
            </div>
            <div class="grid four">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <article class="card">
                    <div class="thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium' ); ?>
                        <?php else : ?>
                            <div style="display:grid;place-items:center;min-height:156px;color:#64748B;">Image</div>
                        <?php endif; ?>
                    </div>
                    <?php $c = get_the_category(); if ( ! empty( $c ) ) : ?>
                        <span class="tag tag-<?php echo esc_attr( $c[0]->slug ); ?>"><?php echo esc_html( $c[0]->name ); ?></span>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="meta"><?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}
