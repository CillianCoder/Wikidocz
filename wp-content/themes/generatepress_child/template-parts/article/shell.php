<?php
/**
 * Article shell with TOC sidebar and article body.
 * Runs inside the loop - expects global $post
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section class="section section-article">
    <div class="wrap">
        <div class="article-shell">
            <aside class="toc">
                <h3>Contents</h3>
                <?php wikidocz_toc_from_content( get_the_content() ); ?>
            </aside>

            <article class="article-body">
                <?php the_content(); ?>
                <?php
                wp_link_pages( array(
                    'before'      => '<div class="pagination" style="margin-top:36px;">',
                    'after'       => '</div>',
                    'next_or_number' => 'number',
                ) );
                ?>
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