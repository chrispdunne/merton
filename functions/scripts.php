<?php
function merton_async_defer_forscript( $url ) {
    if ( strpos( $url, '#asyncdefer' ) === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncdefer', '', $url );
    else
        return str_replace( '#asyncdefer', '', $url ) . "' async='true' defer='true'"; 
}
add_filter( 'clean_url', 'merton_async_defer_forscript', 11, 1 );