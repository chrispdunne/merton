<?php

// styles
wp_enqueue_style( 
    'tailwind', 
    get_template_directory_uri() . '/dist/css/style.css', 
    [], 
    "1.0.0"
);
wp_enqueue_style( 
    'font', 
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap'
);

// nav
function merton_setup() {
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'merton' ),
		)
	);
}
add_action( 'after_setup_theme', 'merton_setup' );


// file uploads
@ini_set( 'upload_max_size' , '4096M' );
@ini_set( 'post_max_size', '4096M');
@ini_set( 'max_execution_time', '300' );
