<?php
/**
 * Grid four loop.
 * Expects: $args['skip_featured'] (bool), $args['featured_id'] (int)
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$skip_featured = $args['skip_featured'] ?? false;
$featured_id   = $args['featured_id'] ?? 0;
?>
<div class="grid four">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( $skip_featured && get_the_ID() === $featured_id ) continue; ?>
        <?php get_template_part( 'template-parts/card/standard' ); ?>
    <?php endwhile; ?>
</div>