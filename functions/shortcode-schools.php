<?php 
function merton_schools() {
    $clusters = get_terms( array(
        'taxonomy' => 'cluster'
    ) );
 
    if ( $clusters ) :
        ob_start();
        get_template_part( 'src/templates/school/list', null, ['clusters' => $clusters ] );
        return ob_get_clean();
    endif; // clusters 
   
}
add_shortcode( 'schools', 'merton_schools' );