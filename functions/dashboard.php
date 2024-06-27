<?php

/* 
** Custom widgets
*/

function merton_dashboard_widget_schemes() {
   
    $user = new WP_User( get_current_user_id() ); 
    $sow_roles = [];

    foreach ( $user->roles as $role ) {
        if ( strpos( $role, 'sow' ) !== false ) {
            $sow_roles[] = $role;
        }  
    }

    if ( !empty( $sow_roles ) ) {
      
         $args = array(
            'meta_key'          => '_members_access_role',
            'meta_value'        => $sow_roles,
            'compare'           =>'IN',
            'post_type'         => 'scheme',
            'posts_per_page'    => -1
        );
        $schemes = get_posts( $args );   
     
        foreach( $schemes as $scheme ) {
            echo "<div><a href='$scheme->guid'>$scheme->post_title</a></div>";
        }

    }  
}

function merton_get_entries( $entry_type ) {
    $user = new WP_User( get_current_user_id() ); 
    
    // Should it also query by school?
    $args = array(
        'meta_key'          => 'email',
        'meta_value'        => $user->user_email,
        'post_type'         => $entry_type,
        'posts_per_page'    => 99
    );
    $entries = get_posts( $args );  
    return $entries;
}

function merton_dashboard_widget_competitions() {
   
    $entries = merton_get_entries( 'competition_entry' );
    
    foreach( $entries as $entry ) {
        $competition_id = get_field( 'competition', $entry->ID );
        $competition = get_post(  $competition_id );
        $waitlist = get_field( 'waitlist', $entry->ID );
        if ( !$waitlist ) {
            echo "<div><a target='_blank' href='" . $competition->guid . "'>$competition->post_title</a></div>";
        }
    }

}

function merton_dashboard_widget_workshops() {
   
    $entries = merton_get_entries( 'workshop_entry' );
    
    foreach( $entries as $entry ) {
        $workshop_id = get_field( 'workshop', $entry->ID );
        $workshop = get_post(  $workshop_id );
        $waitlist = get_field( 'waitlist', $entry->ID );
        if ( !$waitlist ) {
            echo "<div><a target='_blank' href='" . $workshop->guid . "'>$workshop->post_title</a></div>";
        }
    }

}

function merton_dashboard_widget_waitlist() {
   
    $comp_entries = merton_get_entries( 'competition_entry' );
    $workshop_entries = merton_get_entries( 'workshop_entry' );

    if (count( $comp_entries ) > 0 || count( $workshop_entries ) > 0 ) {
        echo "<p>You have signed up to the Waiting List for the following events. We will be in touch if a space opens up:</p>";
    }

    foreach( $comp_entries as $c_entry ) {
        $competition_id = get_field( 'competition', $c_entry->ID );
        $competition = get_post(  $competition_id );
        $waitlist = get_field( 'waitlist', $c_entry->ID );
        if ( $waitlist ) {
            echo "<div><a target='_blank' href='" . $competition->guid . "'>$competition->post_title</a></div>";
        }
    }

    foreach( $workshop_entries as $w_entry ) {
        $workshop_id = get_field( 'workshop', $w_entry->ID );
        $workshop = get_post(  $workshop_id );
        $waitlist = get_field( 'waitlist', $w_entry->ID );
        if ( !$waitlist ) {
            echo "<div><a target='_blank' href='" . $workshop->guid . "'>$workshop->post_title</a></div>";
        }
    }
}

function merton_video_widget() {
    $query_video_args = array(
        'post_type'      => 'video',
         'posts_per_page' => - 1,
    );
    
    $query_vids = new WP_Query( $query_video_args );

    echo "<table>";
    foreach ( $query_vids->posts as $key => $vid ) {
        echo '<tr>';   

        echo '<td>';   
        echo $vid->post_title;
        echo '</td>';

        echo '<td>';   
        echo get_permalink( $vid->ID );
        echo '</td>';

        echo '</tr>';   
    }
    echo "</table>";
}

function merton_custom_dashboard_widgets() {
    wp_add_dashboard_widget( 'custom_merton_widget', 'Schemes Of Work', 'merton_dashboard_widget_schemes');
    wp_add_dashboard_widget( 'custom_merton_widget_2', 'Competitions entered', 'merton_dashboard_widget_competitions');
    wp_add_dashboard_widget( 'custom_merton_widget_3', 'Workshops signed up to', 'merton_dashboard_widget_workshops');
    wp_add_dashboard_widget( 'custom_merton_widget_4', 'Event Waiting List', 'merton_dashboard_widget_waitlist');


    // wp_add_dashboard_widget( 'custom_merton_widget_4', 'Videos', 'merton_video_widget');
}
add_action( 'wp_dashboard_setup', 'merton_custom_dashboard_widgets' );
 
/* 
** Remove widgets
*/

function merton_remove_dashboard_widgets(){

    if ( current_user_can( 'manage_options' ) ) {    
        return;
    }

    global $wp_meta_boxes;
     
    foreach( $wp_meta_boxes["dashboard"] as $position => $core ){
        foreach( $core["core"] as $widget_id => $widget_info ) {
            if ( strpos( $widget_id, 'custom_merton_widget' ) === false ) {
                remove_meta_box( $widget_id, 'dashboard', $position );
            }
        }
    }

    wp_add_dashboard_widget( 'custom_merton_widget', 'Theme Support', 'merton_dashboard_widget');
    
}
add_action( 'wp_dashboard_setup', 'merton_remove_dashboard_widgets', 10000 );

remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

/* 
** Remove application passwords
*/

function merton_customize_app_password_availability(
    $available,
    $user
) {
    if ( ! user_can( $user, 'manage_options' ) ) {
        $available = false;
    }
 
    return $available;
}
add_filter(
    'wp_is_application_passwords_available_for_user',
    'merton_customize_app_password_availability',
    10,
    2
);

/* 
** Hide notices
*/

function merton_hide_notices() { 
    if ( !current_user_can( 'manage_options' ) ) {
        remove_all_actions( 'admin_notices' );
    } 
} 
add_action( 'admin_head', 'merton_hide_notices', 1 );
