<?php
if ( !is_front_page() ) { ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="w-full h-48 bg-center" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
        <?php endif; ?>
    <div class="purple-bg text-center py-12"><h1 class="text-4xl font-bold"><?php the_title() ?></h1></div>
<?php }