<?php
function merton_competition_form_success( $form_reponse ) {
    $title = sanitize_text_field( $form_reponse['title'] );
    $comments = sanitize_text_field( $form_reponse['comments'] );
    $phone = sanitize_text_field( $form_reponse['phone']);
    $competition_id = sanitize_text_field( $form_reponse['competition_id']);
    $email = sanitize_email( $form_reponse['email'] );
    $school_id = sanitize_text_field( $form_reponse['school']);
    $waitlist = $form_reponse['waitlist'] === 'true';

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
            'school'        => $school_id,
            'waitlist'      => $waitlist
        ]
        
    );

    $competition_creation_response = wp_insert_post( $competition_entry_args );

    if ( is_int( $competition_creation_response  ) && $competition_creation_response > 0 ) {

        // success so email out to admin && user
        $admin_email = get_option( 'admin_email', '' );
        $entry_edit_link = get_edit_post_link( $competition_creation_response );
        $event_date = get_field( 'start_datetime', $competition_id );
        
        $maybe_waitlist_title = $waitlist ? 'waitlist' : 'competition';
        $maybe_waitlist_content = $waitlist ? 
            '<p>Unfortunately the event is full, but you have been added to the waitlist' :
            "<p>The event date is: $event_date </p>";

        wp_mail( 
            $admin_email,
            "new $maybe_waitlist_title entry",
            "<h1>New $maybe_waitlist_title entry</h1>
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
            $email, 
            'Thanks for your competition entry',
            "<h3>$title, thanks for your entry to $competition->post_title</h3>
            $maybe_waitlist_content
            <p>For more information visit: <a href='$competition->guid'>$competition->post_title</a> </p>
            <p>Many thanks, Merton SSP</p>",
            ['Content-Type: text/html; charset=UTF-8']
        );

    }
}