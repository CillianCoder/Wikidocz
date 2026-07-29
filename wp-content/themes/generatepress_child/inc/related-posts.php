<?php
/**
 * Related posts: sidebar list (3 items).
 */
function wikidocz_related_posts_list( $post_id ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) {
        return;
    }
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

/**
 * Related posts grid (4 items, 2 rows) - used on single.php.
 */
function wikidocz_related_posts_grid( $post_id ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) {
        return;
    }
    $cat = $categories[0];
    $query = new WP_Query( array(
        'category__in'        => array( $cat->term_id ),
        'post__not_in'        => array( $post_id ),
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => 1,
    ) );
    if ( ! $query->have_posts() ) {
        return;
    }
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
                    <p class="meta">By <?php the_author(); ?> &middot; <?php echo get_the_date(); ?> &middot; <?php echo wikidocz_read_time(); ?> min read</p>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}