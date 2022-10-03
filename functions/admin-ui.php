<?php

/**
 * Remove the color picker from the user profile admin page.
 */
function merton_admin_customisations() {
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}
add_action( 'admin_head-profile.php', 'merton_admin_customisations' );


function merton_hide_jetpack() {
    if (!current_user_can('manage_options')) {
        remove_menu_page( 'jetpack' );
    }
}
add_action('jetpack_admin_menu', 'merton_hide_jetpack');
