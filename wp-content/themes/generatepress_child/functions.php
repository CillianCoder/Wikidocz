<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

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
            <a href="/categories/" style="background: #fff; color: #0D1B2A; border: 1px solid #D7DEE8; border-radius: 8px; padding: 13px 18px; font-family: Poppins, sans-serif; font-weight: 600; font-size: 14px; text-decoration: none; white-space: nowrap;">All categories</a>
        </div>
        <div class="fc-grid">
            
            <a class="fc-card" href="/category/entertainment/" style="--fc-bg:#FFF1F2;--fc-accent:#E11D48;--fc-glow:rgba(225,29,72,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/><line x1="17" y1="17" x2="22" y2="17"/></svg>
                </div>
                <h3 class="fc-name">Entertainment</h3>
                <span class="fc-count">24 articles</span>
            </a>

            <a class="fc-card" href="/category/technology/" style="--fc-bg:#E0F2FE;--fc-accent:#0284C7;--fc-glow:rgba(2,132,199,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>
                </div>
                <h3 class="fc-name">Technology</h3>
                <span class="fc-count">31 articles</span>
            </a>

            <a class="fc-card" href="/category/health/" style="--fc-bg:#F0FDF4;--fc-accent:#16A34A;--fc-glow:rgba(22,163,74,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/><path d="M3.5 12h3l2 -3 3 6 2 -3h3.5"/></svg>
                </div>
                <h3 class="fc-name">Health</h3>
                <span class="fc-count">18 articles</span>
            </a>

            <a class="fc-card" href="/category/finance/" style="--fc-bg:#FFF7ED;--fc-accent:#EA580C;--fc-glow:rgba(234,88,12,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <h3 class="fc-name">Finance</h3>
                <span class="fc-count">15 articles</span>
            </a>

            <a class="fc-card" href="/category/home/" style="--fc-bg:#FDF4FF;--fc-accent:#A855F7;--fc-glow:rgba(168,85,247,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </div>
                <h3 class="fc-name">Home</h3>
                <span class="fc-count">12 articles</span>
            </a>

            <a class="fc-card" href="/category/travel/" style="--fc-bg:#DDF9F9;--fc-accent:#0EA5A8;--fc-glow:rgba(14,165,168,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <h3 class="fc-name">Travel</h3>
                <span class="fc-count">20 articles</span>
            </a>

            <a class="fc-card" href="/category/learning/" style="--fc-bg:#FFF4DA;--fc-accent:#B45309;--fc-glow:rgba(180,83,9,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="8" y1="7" x2="16" y2="7"/><line x1="8" y1="11" x2="13" y2="11"/></svg>
                </div>
                <h3 class="fc-name">Learning</h3>
                <span class="fc-count">27 articles</span>
            </a>

            <a class="fc-card" href="/category/lifestyle/" style="--fc-bg:#F0F4FF;--fc-accent:#4F46E5;--fc-glow:rgba(79,70,229,.12)">
                <div class="fc-icon-wrap">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
                </div>
                <h3 class="fc-name">Lifestyle</h3>
                <span class="fc-count">22 articles</span>
            </a>

        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_action('pre_get_posts', 'wikidocz_category_posts_per_page');
function wikidocz_category_posts_per_page($query) {
    if ($query->is_category() && $query->is_main_query()) {
        $query->set('posts_per_page', 13);
    }
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
