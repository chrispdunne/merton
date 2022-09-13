<?php

function merton_archive_logic( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// Not a query for an admin page.
		// It's the main query for a front end page of your site.

		if ( is_post_type_archive( ['competition', 'workshop'] ) ) {
		 
			// Let's change the query for category archives.
            $date_now = date('Y-m-d');
            $query->set( 'meta_query', [
                [
                    'key' => 'start_datetime',
                    'value' => $date_now . ' 00:00:00',
                    'compare' => '>=',
                ]
            ] );

            $query->set( 'meta_key', 'start_datetime' );
            $query->set( 'orderby', 'meta_value' );
            $query->set( 'order', 'ASC' );
		}
	}
}
add_action( 'pre_get_posts', 'merton_archive_logic' );