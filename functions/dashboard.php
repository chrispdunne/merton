<?php

/* 
** Custom widgets
*/

function merton_dashboard_widget() {
   
    $user = new WP_User(get_current_user_id()); 
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
            'post_type' => 'scheme',
            'posts_per_page' => -1
        );
        $schemes = get_posts( $args );   
     
        // echo "<pre>" . print_r( $schemes, true) .  "</pre>";
        foreach( $schemes as $scheme ) {
            echo "<div><a href='$scheme->guid'>$scheme->post_title</a></div>";
        }

    }  
}

function merton_video_widget() {

    // $query_images_args = array(
    //     'post_type'      => 'attachment',
    //     'post_mime_type' => 'video/mp4',
    //     'post_status'    => 'inherit',
    //     'posts_per_page' => - 1,
    // );
    
    // $query_images = new WP_Query( $query_images_args );
    
    // $images = array();

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
        // wp_insert_post([
        //     'ID' => $key + 199,
        //     'post_content' => '[video width="1920" height="1080" mp4="' 
        //         . wp_get_attachment_url( $vid->ID )
        //         . '"][/video]',
        //     'post_title' => $vid->post_title,
        //     'post_type' => 'video'
        // ],true,true);
  

    }
    echo "</table>";
    
}

function merton_custom_dashboard_widgets() {
    wp_add_dashboard_widget( 'custom_merton_widget', 'Schemes Of Work', 'merton_dashboard_widget');
    wp_add_dashboard_widget( 'custom_merton_widget_2', 'Videos', 'merton_video_widget');
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
            if ( $widget_id !== 'custom_merton_widget' ) {
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
