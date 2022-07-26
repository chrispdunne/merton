<?php
function merton_validate_form( $recaptcha_res, $honeypot_res ) {

    $recaptcha_is_valid = merton_verify_recaptcha( $recaptcha_res );
    $honeypot_is_valid = $honeypot_res  === '';

    return $recaptcha_is_valid && $honeypot_is_valid;

}