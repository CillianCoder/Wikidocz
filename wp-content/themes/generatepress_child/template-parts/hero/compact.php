<?php
/**
 * Compact hero: filter row only.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section class="page-hero page-hero--compact">
    <div class="wrap">
        <?php
        $filter_urls = $args['filter_urls'] ?? array();
        $filter      = $args['filter'] ?? '';
        get_template_part( 'template-parts/filter/row', null, array(
            'filter_urls' => $filter_urls,
            'filter'      => $filter,
        ) );
        ?>
    </div>
</section>