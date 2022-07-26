<?php

function merton_handle_competition_form( $form_reponse ) {
    if ( ! isset( $form_reponse['merton_competition_nonce_field'] ) 
        || ! wp_verify_nonce( $form_reponse['merton_competition_nonce_field'], 'merton_competition_nonce_action' ) 
    ) {
        exit;
    } else {
        $form_is_valid = merton_validate_form( $form_reponse['g-recaptcha-response'], $form_reponse['fax'] );
        if ( $form_is_valid ) {
            merton_competition_form_success( $form_reponse );
        } 
    }
}

function merton_competition_form_success( $form_reponse ) {
    $title = sanitize_text_field( $form_reponse['title'] );
    $comments = sanitize_text_field( $form_reponse['comments'] );
    $phone = sanitize_text_field( $form_reponse['phone']);
    $competition_id = sanitize_text_field( $form_reponse['competition_id']);
    $email = sanitize_email( $form_reponse['email'] );
    $school_id = sanitize_text_field( $form_reponse['school']);

    $competition = get_post( $competition_id );
    $school = get_post( $school_id );

    $competition_entry_args = array(

        'post_title'    => $title,     
        'post_status'   => 'publish',
        'post_content'  => $comments,
        'post_type'     => 'competition_entry',
        'meta_input' => [
            'phone'         => $phone,
            'competition'   => $competition_id,
            'email'         => $email,
            'school'        => $school_id
        ]
        
    );

    $competition_creation_response = wp_insert_post( $competition_entry_args );

    if ( is_int( $competition_creation_response  ) && $competition_creation_response > 0 ) {

        // success so email out to admin && user
        $admin_email = get_option( 'admin_email', '' );
        $entry_edit_link = get_edit_post_link( $competition_creation_response );
        $event_date = get_field( 'start_datetime', $competition_id );

        wp_mail( 
            $admin_email,
            'new competition entry',
            "<h1>New competition entry</h1>
            <p>Competition:  <a href='$competition->guid'>$competition->post_title</a> </p>
            <p>School:  $school->post_title </p>
            <p>Name:  $title </p>
            <p>Comments: $comments </p>
            <p>Phone:  $phone </p>
            <p>Email:  $email </p>
            <a href='$entry_edit_link'>Click here to view the entry</a>",
            ['Content-Type: text/html; charset=UTF-8']

        );

        wp_mail( 
            $form_reponse['email'] , 
            'Thanks for your competition entry',
            "<h3>$title, thanks for your entry to $competition->post_title</h3>
            <p>The event date is: $event_date </p>
            <p>For more information visit: <a href='$competition->guid'>$competition->post_title</a> </p>
            <p>Many thanks, Merton SSP</p>",
            ['Content-Type: text/html; charset=UTF-8']
        );

    }
}