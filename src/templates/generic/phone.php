<?php
$ID = $args['ID'] ?? get_the_ID();
$phone = get_field( 'phone', $ID );
 if ( $phone ) { ?>
    <h4 class="mb-2">Phone</h4>
    <p class="text-sm"><?php echo $phone; ?></p>
 <?php }