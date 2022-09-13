<?php

// styles
function merton_frontend_scripts() {
    $theme = wp_get_theme();
    wp_enqueue_style( 
        'tailwind', 
        get_template_directory_uri() . '/dist/css/style.css', 
        [], 
        $theme->version
    );
    wp_enqueue_style( 
        'font', 
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap'
    );
    wp_enqueue_script( 'merton-scripts',  get_template_directory_uri() . '/dist/js/scripts.js', ['jquery'], $theme->version );
    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js#asyncdefer', [], $theme->version );
}
add_action( 'wp_enqueue_scripts', 'merton_frontend_scripts' );



// nav
function merton_setup() {
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' =>  'Primary', 
            'menu-2' =>  'Secondary', 
            'menu-3' =>  'Footer 1', 
            'menu-4' =>  'Footer 2', 
            'menu-5' =>  'Footer 3', 
            'menu-6' =>  'Footer 4', 
            'menu-7' =>  'Footer Bottom', 
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