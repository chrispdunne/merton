<?php
function merton_date( $date_string, $format = 'jS M Y', $echo = false ) {
    if ( $echo ) {
        echo date( $format, strtotime( $date_string ) );
    } else {
        return date( $format, strtotime( $date_string ) );
    }
}
function merton_time( $date_string, $echo = false ) {
    if ( $echo ) {
        merton_date( $date_string, 'g:i A', $echo );
    } else {
        return  merton_date( $date_string, 'g:i A' );
    }
}