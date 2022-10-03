<?php $downloads = get_field( 'files' );
if ( $downloads ) : ?>
    <div class="max-w-7xl mx-auto pb-12 px-12">
        <h2>Downloads</h2>
        <?php foreach ( $downloads as $download ) : ?>
            <a class="underline block" href="<?php echo $download['file']['url'] ?>">
                <?php icon( 'download' ); 
                echo $download['file']['title']; ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif;