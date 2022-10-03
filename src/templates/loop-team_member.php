<?php $ID = $args['ID'] ?? get_the_ID(); ?>
<div class="md:flex mb-12 px-6">
    <div class="px-8 w-auto flex-initial md:w-96">
    <?php get_template_part( 'src/templates/thumbnail', null, ['ID' => $ID, 'bg_size' => 'contain'] ) ?>
    </div>
    <div class="flex-1 px-8">
        <h3><?php echo get_the_title( $ID ) ?></h3>
        <h5 class="font-bold mb-4"><?php echo get_field( 'position', $ID ) ?></h5>
        <p class="text-sm"><?php 
            if ( !$args || !$args['excerpt'] === false ) {
                echo get_the_content( $ID );
            }
        ?></p>
    </div>
   
</div>
