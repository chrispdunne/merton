<?php
$page_title = get_the_title();
if ( strlen( $page_title ) > 40 ) {
    $long_title = true;
} 
if ( !is_front_page() ) { ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="w-full h-72 bg-center bg-cover" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
        <?php endif; ?>
    <div class="purple-bg text-center pb-12 pt-6">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="<?php echo $long_title ? 'text-3xl' : '' ?>"><?php echo $page_title ?></h1>
            <?php if ( get_field( 'tagline' ) ): ?>
                <div class="text-xl max-w-2xl mx-auto mt-6">
                    <?php echo get_field( 'tagline' ) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }