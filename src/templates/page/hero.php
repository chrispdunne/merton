<?php
if ( !is_front_page() ) { ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="w-full h-72 bg-center bg-cover" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
        <?php endif; ?>
    <div class="purple-bg text-center pb-12 pt-6">
        <h1><?php the_title() ?></h1>
        <?php if ( get_field( 'tagline' ) ): ?>
            <div class="text-xl max-w-2xl mx-auto mt-6">
                <?php echo get_field( 'tagline' ) ?>
            </div>
        <?php endif; ?>
    </div>
<?php }