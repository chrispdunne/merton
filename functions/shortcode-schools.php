<?php 
function merton_schools() {
    $clusters = get_terms( array(
        'taxonomy' => 'cluster'
    ) );
 
    if ( $clusters ) :
        get_template_part( 'src/templates/school/list', null, ['clusters' => $clusters ] );
    endif; // clusters 
   
}
add_shortcode( 'schools', 'merton_schools' );