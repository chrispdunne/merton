<?php 
$ID = $args['ID'] ?? get_the_ID(); 
$bg_size = $args['bg_size'] ?? 'cover';
$custom_img = get_field( 'custom_header_image', $ID );
$img_url = $custom_img ? $custom_img : get_the_post_thumbnail_url( $ID ); ?>
<div class="w-full h-72 bg-no-repeat bg-center bg-contain bg-<?php 
    echo $bg_size;
    if( !$img_url ) { echo ' grey-bg'; } 
?>" style="background-image: url(<?php echo $img_url ?>)"></div>