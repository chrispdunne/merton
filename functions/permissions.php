<?php function merton_user_has_permission_to_view() {
    $user_permissions = get_user_meta( get_current_user_id(),'wp_capabilities', true  );
    $post_permissions = get_post_meta( get_the_ID(), '_members_access_role' );
 
    // admin check
    if ( $user_permissions && array_key_exists( 'administrator', $user_permissions ) ) {
        return true;
    }

    // throrough check
    if ( $post_permissions && count( $post_permissions ) > 0 ) {
        if (!$user_permissions || count( $user_permissions ) == 0 ) {
            return false;
        }
        foreach ( $post_permissions as $permission ) {
            if ( array_key_exists( $permission, $user_permissions ) ) {
                if ( $user_permissions[$permission] ) {
                    return true;
                }
            }
        }  
    } else {
        return true;
    }
    return false;
}