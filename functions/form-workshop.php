<?php
function merton_workshop_form_success( $form_reponse ) {
    
    $title = sanitize_text_field( $form_reponse['title'] );
    $phone = sanitize_text_field( $form_reponse['phone']);
    $workshop_id = sanitize_text_field( $form_reponse['workshop_id']);
    $workshop_name = sanitize_text_field( $form_reponse['workshop_name']);
    $workshop_date = sanitize_text_field( $form_reponse['workshop_date']);
    $email = sanitize_email( $form_reponse['email'] );
    $attendee = sanitize_text_field( $form_reponse['attendee'] );
    $delegates = sanitize_text_field( $form_reponse['delegates'] );

    $school_id = sanitize_text_field( $form_reponse['school']);
    $other_school = sanitize_text_field( $form_reponse['other_school']);
    $comments = sanitize_text_field( $form_reponse['comments'] );

    $workshop = get_post( $workshop_id );
    $school = get_post( $school_id );

    $workshop_entry_args = array(

        'post_title'    => $title,     
        'post_status'   => 'publish',
        'post_content'  => $comments,
        'post_type'     => 'workshop_entry',
        'meta_input' => [
            'phone'         => $phone,
            'workshop'      => $workshop_id,
            'workshop_name' => $workshop_name,
            'workshop_date' => $workshop_date,
            'email'         => $email,
            'school'        => $school_id,
            'other_school'  => $other_school,
            'attendee'      => $attendee,
            'delegates'     => $delegates
        ]
        
    );

    $workshop_creation_response = wp_insert_post( $workshop_entry_args );

    if ( is_int( $workshop_creation_response  ) && $workshop_creation_response > 0 ) {

        // success so email out to admin && user
        $admin_email = get_option( 'admin_email', '' );
        $entry_edit_link = get_edit_post_link( $workshop_creation_response );
        $event_date = get_field( 'start_datetime', $workshop_id );

        wp_mail( 
            $admin_email,
            'new workshop entry',
            "<h1>New workshop entry</h1>
            <p>Workshop:  <a href='$workshop->guid'>$workshop->post_title</a> </p>
            <p>School:  $school->post_title $other_school </p>
            <p>Name:  $title </p>
            <p>Phone:  $phone </p>
            <p>Email:  $email </p>
            <p>Attending member of staff:  $attendee </p>
            <p>Number of delegates:  $delegates </p>
            <p>Comments: $comments </p>
            <a href='$entry_edit_link'>Click here to view the entry</a>",
            ['Content-Type: text/html; charset=UTF-8']

        );

        wp_mail( 
            $form_reponse['email'] , 
            'Thanks for your workshop entry',
            "<h3>$title, thanks for your entry to $workshop->post_title</h3>
            <p>The event date is: $event_date </p>
            <p>For more information visit: <a href='$workshop->guid'>$workshop->post_title</a> </p>
            <p>Many thanks, Merton SSP</p>",
            ['Content-Type: text/html; charset=UTF-8']
        );

    }
}