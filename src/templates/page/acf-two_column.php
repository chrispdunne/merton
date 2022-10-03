<?php if ( $args ) : ?>
<div>
<div class="md:flex max-w-7xl mx-auto gap-12 my-12">
    <div class="col-1 my-4 mx-4 md:w-1/2 text-center">
        <div 
            class="h-80 bg-cover" 
            style="background-image:url(<?php echo $args['image']['url'] ?>)"
        >
        </div>
        <div 
            class="py-12 <?php echo strtolower( $args['background_color'] ) ?>-bg"
        >
            <h2 class="text-6xl font-bold py-4"><?php echo esc_html( $args['title'] ) ?></h2>
            <p class="text-lg py-4 whitespace-pre-line"><?php echo esc_html( $args['text'] ) ?></p>
        </div>
    </div>

    <div class="col-2 my-4 mx-4 md:w-1/2 text-center">
        <div 
            class="h-80 bg-cover" 
            style="background-image:url(<?php echo $args['image_2']['url'] ?>)"
        >
        </div>
        <div 
            class="py-12 <?php echo strtolower( $args['background_color_2'] ) ?>-bg"
        >
            <h2 class="text-6xl font-bold py-4"><?php echo esc_html( $args['title_2'] ) ?></h2>
            <p class="text-lg py-4 whitespace-pre-line"><?php echo esc_html( $args['text_2'] ) ?></p>
        </div>
    </div>
</div>
</div>
<?php endif; ?>