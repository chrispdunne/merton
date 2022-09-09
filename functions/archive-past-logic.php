<?php

function merton_archive_logic( $query ) {
	// if ( ! is_admin() && $query->is_main_query() ) {
	// 	// Not a query for an admin page.
	// 	// It's the main query for a front end page of your site.

	// 	if ( is_post_type_archive( ['competition', 'workshop'] ) ) {
		 
	// 		// Let's change the query for category archives.
	// 		// $query->set( 'posts_per_page', 1 );
    //         $query->set( 'meta_query', [
    //             [
    //                 'key' => 'start_datetime',
    //                 'value' => date('Ymd'),
    //                 // 'value' => date('Y-m-d H:i:s'),

    //                 // 2022-10-14 10:00:00
    //                 'compare' => '>=',
    //                 // 'type' => 'DATE'
    //             ]
    //         ] );

	// 	}
	// }
}
add_action( 'pre_get_posts', 'merton_archive_logic' );