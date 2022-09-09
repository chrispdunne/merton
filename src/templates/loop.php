<a class="flex flex-col" href="<?php the_permalink() ?>">
    <?php get_template_part( 'src/templates/thumbnail' ) ?>
    <span class="text-xs font-bold inline-block mt-4"><?php 
        if ( get_field( 'start_datetime' ) ) {
            echo date( 'jS F Y', strtotime( get_field( 'start_datetime' ) ) );
        } else {
            echo get_the_date();
        } ?></span>
    <h3><?php echo get_the_title() ?></h3>
    <p class="text-sm"><?php echo get_the_excerpt() ?></p>
    <button class="btn mt-8">Read More</button>
</a>
