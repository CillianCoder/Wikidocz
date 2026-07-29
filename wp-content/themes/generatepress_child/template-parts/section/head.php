<?php
/**
 * Section head: h2 + description + optional top pagination.
 * Pass $args['pagination'] => true to show pagination links top-right.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="section-head">
    <div>
        <h2><?php echo esc_html( $args['title'] ?? $title ); ?></h2>
        <?php if ( ! empty( $args['description'] ?? $description ) ) : ?>
            <p><?php echo esc_html( $args['description'] ?? $description ); ?></p>
        <?php endif; ?>
    </div>
    <?php if ( ! empty( $args['pagination'] ) ) : ?>
        <?php get_template_part( 'template-parts/section/pagination' ); ?>
    <?php endif; ?>
</div>