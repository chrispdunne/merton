<?php

add_action( 'template_redirect', 'merton_redirect_team' );

function merton_redirect_team() {
    if ( is_singular( 'team_member' ) ) :
        wp_redirect( home_url() . '/meet-the-team', 301 );
        exit;
    endif;
}

?>