<?php
function merton_load_color_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();
    
    $choices = [
        'none',
        'purple',
        'green',
        'grey',
        'blue',
        'yellow',
        'orange',
        'pink'
    ];

    foreach( $choices as $choice ) {
        
        $field['choices'][ $choice ] = $choice;
        
    }
    
    return $field;
    
}

add_filter('acf/load_field/name=background_color', 'merton_load_color_field_choices');
add_filter('acf/load_field/name=background_color_2', 'merton_load_color_field_choices');