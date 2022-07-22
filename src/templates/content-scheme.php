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

<h1 class="font-bold text-3xl mb-8"><?php the_title() ?></h1>
<?php $folders = get_field( 'folders' );
if ( $folders ) : ?>
    <?php foreach ( $folders as $folder ) : ?>
        <div class="my-8">
            <h4 class="font-bold text-lg mb-3"><?php echo $folder['folder_name']; ?></h4>
            <?php if ( $folder['folder_contents'] ) : ?>
                <?php foreach ( $folder['folder_contents'] as $pdf ) : ?>
                    <a class="flex my-3" href="<?php echo $pdf['pdf']['url']; ?>">
                        <?php icon('download');
                        echo $pdf['pdf']['title']; ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<?php the_content() ?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->