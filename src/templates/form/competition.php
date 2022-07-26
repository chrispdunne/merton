<form method="post">

    <label class="block mb-6" for="title">Full name
        <input class="block border-2" type="text" name="title" required>
    </label> 

    <label class="block mb-6" for="phone">Phone
        <input class="block border-2" type="text" name="phone" required>
    </label> 

    <label class="block mb-6" for="email">Email
        <input class="block border-2" type="email" name="email" required>
    </label> 

    <label class="block mb-6" for="school">School
        <select class="block border-2" name="school" required>
            <option value="">Select school</option>
            <?php 
            $schools = get_posts([
                'post_type' => 'school'
            ]);
            foreach ( $schools as $school ) : ?>
                <option value="<?php echo $school->ID; ?>"><?php echo $school->post_title; ?></option>
            <?php endforeach;
            ?>
        </select>
    </label>

    <label class="block mb-6" for="comments">Comments
        <textarea class="block border-2"  name="comments" id="comments" rows="4" cols="20"></textarea> 
    </label>

    <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>
    <input type="hidden" name="competition_id" id="competition_id" value="<?php echo get_the_ID() ?>" />

    <input type="text" id="fax" name="fax">

    <button type="submit">Submit</button>

    <?php wp_nonce_field( 'merton_competition_nonce_action',
     'merton_competition_nonce_field' ); ?>
 
</form>

<?php merton_handle_competition_form( $_POST );