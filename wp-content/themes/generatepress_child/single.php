<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>
<main id="main" class="single-v2">
    <?php while ( have_posts() ) : the_post();
        $categories = get_the_category();
        $cat = ! empty( $categories ) ? $categories[0] : null;
    ?>

    <?php get_template_part( 'template-parts/hero/single', null, array(
        'category' => $cat,
    ) ); ?>

    <?php get_template_part( 'template-parts/article/shell' ); ?>

    <?php get_template_part( 'template-parts/related/grid', null, array(
        'post_id' => get_the_ID(),
    ) ); ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>