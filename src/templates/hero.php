<?php
$page_title = $args['title'] ? $args['title']  : get_the_title();
$sub_title = $args['subtitle'] ? $args['subtitle'] : get_field( 'tagline' );
if ( strlen( $page_title ) > 40 ) {
    $long_title = true;
} 
if ( !is_front_page() ) { ?>
    <?php if ( has_post_thumbnail() && !is_home() && !is_archive() ) : ?>
        <?php get_template_part( 'src/templates/thumbnail' ) ?>
    <?php endif; ?>
    <div class="purple-bg text-center pb-12 pt-6">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="<?php echo $long_title ? 'text-3xl' : '' ?>"><?php echo $page_title ?></h1>
            <?php if ( $sub_title ): ?>
                <div class="text-xl max-w-2xl mx-auto mt-6">
                    <?php echo $sub_title ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }