<?php
$ID = $args['ID'] ?? get_the_ID();
$email = get_field( 'email', $ID );
 if ( $email ) { ?>
    <h4 class="mb-2">Email</h4>
    <p class="text-sm"><?php echo $email; ?></p>
 <?php }