<?php 
$location_name = get_field( 'location_name' );
$address = get_field( 'address' );
if ( $location_name || $address  ) { ?>
    <h4 class="mb-2">Location</h4>
    <p class="text-sm"><?php echo $location_name; ?></p>
    <p class="text-sm"><?php echo $address; ?></p>
<?php }
 

$start = get_post_meta( get_the_ID(), 'start_datetime', true  );  
$end = get_post_meta( get_the_ID(), 'end_datetime', true );  
$start_date =  merton_date( $start );
$end_date =  merton_date( $end );
$start_time = merton_time( $start );
$end_time = merton_time( $end );


if ( $start ) { ?>
    <h4 class="mb-2 mt-4">Workshop date</h4>
    <p class="text-sm"><?php echo $start_date ?> @ <?php echo $start_time ?>

    <?php if ( $end && $start_date !== $end_date ) { ?>
    - <br> <?php echo $end_date ?> @ <?php echo $end_time ?></p>
    <?php } else if ( $start_date === $end_date && $start_time !== $end_time  ) { ?>
    - <?php echo $end_time ?></p>
    <?php } ?>

    </p> 
<?php }

$cost = get_field( 'cost' );
if ( $cost ) { ?>
    <h4 class="mb-2 mt-4">Cost</h4>
    <div class="text-sm"><?php echo $cost ?></div>
<?php } ?>
<a href="#workshop_entry_form" class="btn mb-8 mt-8">Sign up for workshop</a>
<?php 

 