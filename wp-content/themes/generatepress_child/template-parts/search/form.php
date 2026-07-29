<?php
/**
 * Search form in hero - used on search.php
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="search-form-wrap">
    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="field" type="search" name="s" value="<?php echo esc_attr( $query_str ); ?>" aria-label="Search">
    </form>
</div>