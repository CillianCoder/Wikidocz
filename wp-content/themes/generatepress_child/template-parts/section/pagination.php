<?php
/**
 * Pagination links.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $wp_query;
$total_pages = $wp_query->max_num_pages;
if ( $total_pages <= 1 ) return;
?>
<div class="pagination">
    <?php
    echo paginate_links( array(
        'mid_size'  => 2,
        'prev_text' => 'Prev',
        'next_text' => 'Next',
    ) );
    ?>
</div>