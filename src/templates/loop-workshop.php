<?php $ID = $args['ID'] ?? get_the_ID(); ?>
<a class="flex flex-col" href="<?php the_permalink() ?>">
    <?php get_template_part( 'src/templates/thumbnail' ) ?>
    <span class="text-xs font-bold inline-block mt-4"><?php    
        if ( get_field( 'start_datetime', $ID ) ) {
            echo date( 'jS F Y', strtotime( get_field( 'start_datetime', $ID ) ) );
        } else {
            echo get_the_date( null, $ID );
        } ?></span>
    <h3 class="h-28 overflow-hidden"><?php echo get_the_title( $ID ) ?></h3>
    <p class="text-sm h-24"><?php 
        if ( !$args || !$args['excerpt'] === false ) {
            echo get_the_excerpt( $ID );
        }
    ?></p>
    <?php if ( !$args || !$args['button'] === false ) { ?>
        <button class="btn mt-8">Read More</button>
    <?php } ?>
</a>
