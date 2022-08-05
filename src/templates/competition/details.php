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
    <h4 class="mb-2 mt-4">Competition date</h4>
    <p class="text-sm"><?php echo $start_date ?> @ <?php echo $start_time ?>

    <?php if ( $end && $start_date !== $end_date ) { ?>
    - <br> <?php echo $end_date ?> @ <?php echo $end_time ?></p>
    <?php } else if ( $start_date === $end_date && $start_time !== $end_time  ) { ?>
    - <?php echo $end_time ?></p>
    <?php } ?>

    </p> 
<?php }

$team_requirements = get_field( 'team_requirements' );
if ( $team_requirements ) { ?>
    <h4 class="mb-2 mt-4">Team requirements</h4>
    <div class="text-sm"><?php echo $team_requirements ?></div>
<?php }

$entries = get_posts( [
    'post_type' => 'competition_entry', 
    'numberposts' => 50,
    'meta_query' => array(
        array(
            'key'   => 'competition',
            'value' => get_the_ID(),
        )
    )
] );
if ( $entries ) { ?>
    <h4 class="mb-2 mt-4">Schools entered</h4>
    <?php foreach ( $entries as $entry ) :
        $school_id = get_field( 'school', $entry->ID );
        $school =  get_post( $school_id );  ?>
        <span class="text-sm"><?php echo $school->post_title ?></span>
    <?php 

    endforeach;
} ?>
<a href="#enter-competition" class="btn">Enter the competition</a>

Competition cluster 
 
Competition type 
 