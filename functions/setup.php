<?php

// styles
function merton_frontend_scripts() {
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
    wp_enqueue_script( 'merton-scripts',  get_template_directory_uri() . '/dist/js/scripts.js', ['jquery'] );
    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js#asyncdefer', [] );
}
add_action( 'wp_enqueue_scripts', 'merton_frontend_scripts' );



// nav
function merton_setup() {
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' =>  'Primary', 
            'menu-2' =>  'Secondary', 
            'menu-3' =>  'Schools', 
            'menu-4' =>  'Parents', 
            'menu-5' =>  'Young People', 
            'menu-6' =>  'Company', 
            'menu-7' =>  'Footer', 
		)
	);
}
add_action( 'after_setup_theme', 'merton_setup' );


// file uploads
@ini_set( 'upload_max_size' , '4096M' );
@ini_set( 'post_max_size', '4096M');
@ini_set( 'max_execution_time', '300' );

//feat images for pages
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'competition', 'team_member', 'testimonial', 'workshop' ) );

function merton_excerpt_length( $length ) {
    return 30;
}
add_filter('excerpt_length', 'merton_excerpt_length');