<?php
$fields = get_field( 'content' );
if ( $fields ) {
    foreach ( $fields as $field ) {
        get_template_part( 'src/templates/page/acf', $field['acf_fc_layout'], $field );       
    }
}
// echo '<pre>' . print_r( $fields, true ) . '</pre>';