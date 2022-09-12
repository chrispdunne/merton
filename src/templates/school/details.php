<?php
get_template_part( 'src/templates/generic/location' );
$school_type = get_field( 'school_type' );
$website = get_field( 'website' );
$cluster = wp_get_post_terms( get_the_ID(), 'cluster' );


if ( $cluster && !is_wp_error( $cluster ) && count( $cluster ) > 0 ) : ?>
<h4 class="mb-2 mt-4">Cluster</h4>
<div class="text-sm mb-8"><?php echo $cluster[0]->name ?></div>
<?php endif; ?>

<h4 class="mb-2 mt-4">School Type</h4>
<div class="text-sm mb-8"><?php echo $school_type ?></div>

<h4 class="mb-2 mt-4">Website</h4>
<div class="text-sm mb-8"><a href="<?php echo $website ?>"><?php echo $website ?></a></div>