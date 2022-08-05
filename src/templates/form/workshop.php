<?php $nonce_name = 'merton_workshop'; ?>
<div class="green-bg">
<div class="max-w-3xl mx-auto py-12">
<form method="post" id="workshop_entry_form">

    <label class="block mb-6" for="title">Full name
        <input class="block  text-black w-full" type="text" name="title" required>
    </label> 

    <label class="block mb-6" for="phone">Phone
        <input class="block  text-black w-full" type="text" name="phone" required>
    </label> 

    <label class="block mb-6" for="email">Email
        <input class="block  text-black w-full" type="email" name="email" required>
    </label> 

    <label class="block mb-6" for="attendee">Name of attending member of staff
        <input class="block  text-black w-full" type="text" name="attendee" required>
    </label> 

    <label class="block mb-6" for="delegates">Number of delegates
        <input class="block  text-black w-full" type="number" name="delegates" >
    </label>

    <label class="block mb-6" for="school">School
        <select class="block text-black w-full" name="school" id="school_select" required>
            <option value="">Select school</option>
            <option value="other">Other</option>
            <?php 
            $schools = get_posts([
                'post_type' => 'school'
            ]);
            foreach ( $schools as $school ) : ?>
                <option value="<?php echo $school->ID; ?>"><?php echo $school->post_title; ?></option>
            <?php endforeach; ?>
           
        </select>
    </label>

    <label class="block mb-6 other-school hidden" for="other_school">Name of school
        <input class="block text-black w-full" type="text" name="other_school">
    </label> 

    <label class="block mb-6" for="comments">Comments
        <textarea class="block text-black w-full "  name="comments" id="comments" rows="4" cols="20"></textarea> 
    </label>

    <input type="text" id="fax" name="fax">

    <input type="hidden" name="workshop_id" id="workshop_id" value="<?php echo get_the_ID() ?>" />

    <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>

    <button class="btn block mt-6" type="submit">Submit</button>

    <?php wp_nonce_field( $nonce_name . '_nonce_action', $nonce_name . '_nonce_field' ); ?>
 
</form>
</div>
</div>
<?php merton_handle_form( $_POST, $nonce_name, 'merton_workshop_form_success' );