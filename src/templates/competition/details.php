<?php 
get_template_part( 'src/templates/generic/location' );

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

$resources = get_field( 'event_resources' );
if ( $resources && count( $resources ) > 0 ) { ?>
 
    <h4 class="mb-2 mt-4">Resources</h4>
    <div class="text-sm mb-8"><?php foreach ( $resources as $r ) { 
        echo "<a class='block text-xs mb-2' href='" . $r['resource']['url'] . "'>";
        icon('download');
        echo $r['resource']['title'];
        echo '</a>';
    } ?></div>
 
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
<a href="#competition_entry_form" class="btn mb-8">Enter the competition</a>
<?php 

$clusters = wp_get_post_terms( get_the_ID(), 'cluster' );
$types = wp_get_post_categories( get_the_ID(), [ 'fields' => 'names' ] ); 

if ( $clusters && count( $clusters ) > 0 ) { ?>
    <h4 class="mb-2 mt-4">Clusters</h4>
    <p class="text-sm"><?php foreach ( $clusters as $cluster ) { echo $cluster->name;  } ?></p>
<?php }

if ( $types && count( $types ) > 0 ) { ?>
    <h4 class="mb-2 mt-4">Competition type</h4>
    <p class="text-sm"><?php foreach ( $types as $type ) { echo $type;  } ?></p>
<?php }

 
 