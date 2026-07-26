<?php
/**
 * Template Name: Legal
 */
if (!defined('ABSPATH')) exit;

get_header();

$legal_tags = array(
    'privacy-policy'  => 'Privacy Policy',
    'terms'           => 'Terms',
    'disclaimer'      => 'Disclaimer',
    'editorial-policy' => 'Editorial Policy',
);

$current_slug = get_post_field('post_name', get_queried_object_id());
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <?php while (have_posts()) : the_post(); ?>

    <section class="page-hero">
        <div class="wrap">
            <h1><?php the_title(); ?></h1>
            <p>Last updated <?php echo get_the_modified_date('F j, Y'); ?></p>
            <div class="filter-row">
                <?php foreach ($legal_tags as $slug => $label) : ?>
                    <?php if ($slug === $current_slug) : ?>
                        <span class="tag dark"><?php echo esc_html($label); ?></span>
                    <?php else : ?>
                        <a class="tag outline" href="/<?php echo esc_attr($slug); ?>/"><?php echo esc_html($label); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <article class="legal-body">
                <?php the_content(); ?>
            </article>
        </div>
    </section>

    <?php endwhile; ?>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>
