<?php

function merton_validate_image_size( $file ) {
 
    // Calculate the image size in KB
    $image_size = $file['size'] / 1024;

    // File size limit in KB
    $limit = 1024;
 
    $image = getimagesize( $file['tmp_name'] );
    $maximum = array(
        'width' => '2000',
        'height' => '2000'
    );
    $image_width = $image[0];
    $image_height = $image[1];
 
 
    $too_big = "Image file size is too big. It needs to be smaller than $limit KB. Please save photos as jpg no larger than {$maximum['width']} by {$maximum['height']} pixels.";
 
    $too_large = "Image dimensions are too large. Maximum size is {$maximum['width']} by {$maximum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";
     
 
    // Check if it's an image
    $is_image = strpos( $file['type'], 'image' );
 
    if ( ( $image_size > $limit ) && ($is_image !== false) ) {
        //add in the field 'error' of the $file array the message
        $file['error'] = $too_big; 
        return $file;
    }
    elseif ( $image_width > $maximum['width'] || $image_height > $maximum['height'] ) {
        //add in the field 'error' of the $file array the message
        $file['error'] = $too_large; 
        return $file;
    }
    else
        return $file;

}
add_filter( 'wp_handle_upload_prefilter', 'merton_validate_image_size' );

 