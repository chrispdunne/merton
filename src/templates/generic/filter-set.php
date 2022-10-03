<?php 
    $tax = $args['tax'];
    $query_param_override = $args['query_param_override'] ?? $tax;
    $selected_terms = $_GET[$query_param_override];
    $selected_terms_array = array_filter( explode( ',', $selected_terms ) );
    $terms = get_terms( $tax, [] );
 
?>
<div class="checkbox-group-container flex-1 text-center">
    <h3 class="filter-title"><?= $args['label'] ?><?php 
        if (count( $selected_terms_array ) ) {
            echo ' <span class="text-xs">(' . count( $selected_terms_array ) . ')</span>';
        }
    ?>
    <?php icon( 'chevron-down' ) ?></h3>
 
    <div class="checkbox-group py-3">
        <?php foreach ( $terms as $term ) { 
                $is_selected = strpos( $selected_terms, $term->slug ) > -1 ;   
                $ID =  $term->term_id; ?>
                <div>
                    <?= $term->name ?>
                    <?php if ( $is_selected ) { ?>
                        <input type="checkbox" value="<?= $term->slug ?>" checked>
                    <?php } else { ?>
                        <input type="checkbox" value="<?= $term->slug ?>" /> 
                    <?php } ?>
                </div>
            <?php }
        ?>
        <input type="hidden" name="<?= $query_param_override ?>" class="combined" value="<?= $selected_terms ?>" />
        <input class="btn my-3" type="submit" value="Apply" />
    </div>
</div>
