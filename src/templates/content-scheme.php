<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

?>

<article id="post-<?php the_ID(); ?>">
<div class="max-w-7xl mx-auto py-12 px-8">
<?php $user_can_view = merton_user_has_permission_to_view();

if ( $user_can_view ) :   

$folders = get_field( 'folders' );
$videos = get_field( 'videos' );

if ( $folders ) : ?>
    <?php foreach ( $folders as $folder ) : ?>
        <div class="my-8">
            <h4 class="font-bold text-lg mb-3"><?php echo $folder['folder_name']; ?></h4>
            <?php if ( $folder['folder_contents'] ) : ?>
                <?php foreach ( $folder['folder_contents'] as $pdf ) : 
                    if ($pdf && $pdf['pdf'] ) { ?>
                    <a class="flex my-3" href="<?php echo $pdf['pdf']['url']; ?>">
                        <?php icon('download');
                        echo $pdf['pdf']['title']; ?>
                    </a>
                <?php }
            endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endforeach;  
endif; 

if ( $videos && count( $videos ) > 0 ) : ?>
    <div class="my-8">
        <h4 class="font-bold text-lg mb-3">Videos</h4>
        <?php foreach ( $videos as $v ) :                                               
            if ( $v && $v['video'] ) { ?>
                <a class="flex my-3" href="<?php echo $v['video']->guid; ?>">
                    <?php icon('video');
                    echo $v['video']->post_title; ?>
                </a>
            <?php }                              
        endforeach; ?>
    </div>
<?php endif; ?>
<?php endif; //$user_can_view ?>
<?php the_content() ?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->