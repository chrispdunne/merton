<div class="grid grid-cols-3">
<?php foreach ( $args['clusters'] as $cluster ) : ?>
    <?php $schools = get_posts( [
        'post_type' => 'school',
        'numberposts' => 30,
        'tax_query' => array(
            array(
                'taxonomy' => 'cluster',
                'field' => 'slug',
                'terms' => $cluster->slug
            )
        ) 
    ] );

    if ( $schools ) : ?>
        <div class="p-5">
            <h3><?php echo $cluster->name; ?></h3>
            <?php foreach ( $schools as $school ) : ?>
                <div>
                    <a href="<?php echo get_the_permalink( $school->ID ) ?>"><?php echo $school->post_title; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif;
    
endforeach; ?>
</div>




        