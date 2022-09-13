<?php $nonce_name = 'merton_competition'; ?>
<?php $competition_entries = get_posts([
    'post_type' => 'competition_entry', 
    'numberposts' => 99,
    'meta_query' => array(
        array(
            'key'   => 'competition',
            'value' => get_the_ID(),
        )
    )
]);

 

$event_full = false;
if ( $competition_entries && !is_wp_error( $competition_entries ) )  {
    if ( count( $competition_entries ) > 0 ) {
       $max_entries = get_field( 'max_entries' );
       if ( $max_entries || $max_entries === 0 ) {
           if ( count( $competition_entries ) >= $max_entries ) {
               $event_full = true;
           }
       }
    }
} 
 
$disabled = get_field( 'disable_competition_entries', 'option' );
if (!$disabled) : ?>
<div class="green-bg">
<div class="max-w-3xl mx-auto py-12">
<form method="post" >

    <label class="block mb-6" for="title">Full name
        <input class="w-full block text-black" type="text" name="title" required>
    </label> 

    <label class="block mb-6" for="phone">Phone
        <input class="w-full block text-black" type="text" name="phone" required>
    </label> 

    <label class="block mb-6" for="email">Email
        <input class="w-full block text-black" type="email" name="email" required>
    </label> 

    <label class="block mb-6" for="school">School
        <select class="block w-full text-black" name="school" required>
            <option value="">Select school</option>
            <?php if ( $competition_entries && !is_wp_error( $competition_entries ) )  {
                $schools_to_exclude = [];
                foreach ( $competition_entries as $entry ) {
                    $school_id = get_post_meta( $entry->ID, 'school', true );
                    $schools_to_exclude[] = $school_id;
                }
                $schools_to_exclude = array_unique( $schools_to_exclude );
            }
            $schools = get_posts([
                'post_type' => 'school',
                'numberposts' => 99,
                'orderby' => 'date',
                'order' => 'ASC',
                'exclude' => $schools_to_exclude
            ]);
          
            foreach ( $schools as $school ) : ?>
                <option value="<?php echo $school->ID; ?>"><?php echo $school->post_title; ?></option>
            <?php endforeach;
            ?>
        </select>
    </label>

    <label class="block mb-6" for="comments">Comments
        <textarea class="block border-2 w-full text-black"  name="comments" id="comments" rows="4" cols="20"></textarea> 
    </label>

    <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>

    <input type="hidden" name="competition_id" id="competition_id" value="<?php echo get_the_ID() ?>" />

    <input type="hidden" name="waitlist" id="waitlist" value="<?php echo $event_full ? 'true': 'false'; ?>" />

    <input type="text" id="fax" name="fax">

    <button class="btn block" type="submit">Submit</button>

    <?php wp_nonce_field( $nonce_name . '_nonce_action', $nonce_name . '_nonce_field' ); ?>
 
</form>
</div>
</div>
<?php merton_handle_form( $_POST, $nonce_name, 'merton_competition_form_success' );
endif; // !disabled