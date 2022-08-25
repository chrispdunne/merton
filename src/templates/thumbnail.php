<?php $img_url = get_the_post_thumbnail_url();
if ( $img_url ) : ?>
<div class="w-full h-72 bg-center bg-cover" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
<?php endif;