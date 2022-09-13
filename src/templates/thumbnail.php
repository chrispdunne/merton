<?php 
$ID = $args['ID'] ?? get_the_ID(); 
$img_url = get_the_post_thumbnail_url( $ID ); ?>
<div class="w-full h-72 bg-center bg-cover<?php if( !$img_url ) { echo ' grey-bg'; } ?>" style="background-image: url(<?php echo $img_url ?>)"></div>