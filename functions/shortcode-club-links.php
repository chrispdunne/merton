<?php 
function merton_club_links() {
    $sports = get_terms( array(
        'taxonomy' => 'sport'
    ) );
 
    ob_start();
    get_template_part( 'src/templates/club_link/list', null, ['sports' => $sports ] );
    return ob_get_clean();
   
}
add_shortcode( 'club_links', 'merton_club_links' );