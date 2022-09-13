<?php 

$post_type_obj = get_post_type_object( get_post_type() );

$label = $post_type_obj->label ? $post_type_obj->label : get_post_type();
 
get_template_part( 'src/templates/hero', null, ['title' => $label] );
