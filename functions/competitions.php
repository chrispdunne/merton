<?php

function merton_match_compeition_date_to_event_date( $post_id, $post ) {
   
    if ( $post->post_type !== 'competition' ) {
        return;
    }

    $date = get_post_meta(  $post_id,  'start_datetime', true );
    if ( !$date ) {
        return;
    }

    if ( $post->post_date != $date) {
        wp_update_post([
            'ID' => $post_id,
            'post_date' =>  $date
        ]);
    }

}
add_action( 'save_post', 'merton_match_compeition_date_to_event_date', 10, 2 );