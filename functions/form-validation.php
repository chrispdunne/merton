<?php


function merton_validate_form( $recaptcha_res, $honeypot_res ) {

    $recaptcha_is_valid = merton_verify_recaptcha( $recaptcha_res );
    $honeypot_is_valid = $honeypot_res  === '';

    return $recaptcha_is_valid && $honeypot_is_valid;

}

function merton_handle_form( $form_reponse, $name, $callback ) {
    if ( ! isset( $form_reponse[$name . '_nonce_field'] ) 
        || ! wp_verify_nonce( $form_reponse[$name . '_nonce_field'], $name . '_nonce_action' ) 
    ) {
        exit;
    } else {
        $form_is_valid = merton_validate_form( $form_reponse['g-recaptcha-response'], $form_reponse['fax'] );
        if ( $form_is_valid ) {
            call_user_func( $callback, $form_reponse );
        } 
    }
}