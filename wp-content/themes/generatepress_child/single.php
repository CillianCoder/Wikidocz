<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<main id="main" class="single-v2">
    <?php while ( have_posts() ) : the_post();
        $categories = get_the_category();
        $cat = ! empty( $categories ) ? $categories[0] : null;
    ?>

    <section class="page-hero">
        <div class="wrap">
            <?php if ( $cat ) : ?>
                <span class="tag tag-<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?></span>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <p class="meta">By <?php the_author(); ?> | <?php echo get_the_date( 'F j, Y' ); ?> | <?php echo wikidocz_read_time(); ?> min read</p>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="visual" style="margin-top:28px;">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section section-article">
        <div class="wrap">
            <div class="article-shell">
                <aside class="toc">
                    <h3>Contents</h3>
                    <?php wikidocz_toc_from_content( get_the_content() ); ?>
                </aside>

                <article class="article-body">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                        'before' => '<div class="pagination" style="margin-top:36px;">',
                        'after'  => '</div>',
                        'next_or_number' => 'number',
                    ) ); ?>
                </article>
            </div>

            <?php
            the_post_navigation( array(
                'prev_text' => '← %title',
                'next_text' => '%title →',
            ) );
            ?>

            <?php comments_template(); ?>
        </div>
    </section>

    <?php wikidocz_related_posts_grid( get_the_ID() ); ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
