<?php
$ID = $args['ID'] ?? get_the_ID();
$location_name = get_field( 'location_name', $ID );
$address = get_field( 'address', $ID );
if ( $location_name || $address  ) { ?>
    <h4 class="mb-2">Location</h4>
    <p class="text-sm"><?php echo $location_name; ?></p>
    <p class="text-sm"><?php echo $address; ?></p>
<?php }