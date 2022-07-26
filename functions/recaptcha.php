<?php

function merton_verify_recaptcha( $response ) {
    
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    $data = array( 
        'secret' => RECAPTCHA_SECRET_KEY, 
        'response' => $response 
    );
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query( $data )
        )
    );

    $context  = stream_context_create( $options );

    $rc_result = file_get_contents( $url, false, $context );

    $res = json_decode( $rc_result );
 
    if ( $res->success ) {
        return true;
    } else {
        return false;
    }
 
}