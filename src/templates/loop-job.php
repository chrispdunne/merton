<a class="flex flex-col" href="<?php the_permalink() ?>">

    <?php if ( get_field( 'deadline' ) ) : ?>
        <span class="text-xs font-bold inline-block mt-4">
            Deadline: <?php echo get_field( 'deadline' ) ?>
        </span>
    <?php endif; ?>
    <h3><?php echo get_the_title() ?></h3>
    <p class="text-sm"><?php echo get_the_excerpt() ?></p>
    <button class="btn mt-8">Read More</button>
</a>
