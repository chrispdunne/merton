 <div class="">

    <?php get_template_part( 'src/templates/filters-club_link' );
    $sports = array_filter( explode( ',', $_GET['sport'] ) );
    $tax_query = null;
    if ( is_array( $sports ) && count( $sports ) > 0 ) {
        $tax_query = [
            [
                'taxonomy' => 'sport',
                'field' => 'slug',
                'terms' => $sports,
               
            ]
        ];
    } ?>

    <?php $club_links = get_posts( [
        'post_type' => 'club_link',
        'numberposts' => 99,
        'tax_query' => $tax_query,
        'order' => 'ASC',
        'orderby' => 'title'
    ] );

    if ( $club_links && !is_wp_error( $club_links ) && count( $club_links ) > 0 ) : ?>
        <div class="">
            <?php foreach ( $club_links as $club_link ) : 
                $location_name = get_field( 'location_name', $club_link->ID );
                $address = get_field( 'address', $club_link->ID );?>
                <a class="grid grid-cols-12 border-2 items-center mb-2 px-4 py-2" href="<?php  echo get_the_permalink( $club_link->ID ) ?>">
                    <h3 class="col-span-5"><?php echo $club_link->post_title; ?></h3>
                    <p class="col-span-5 leading-4 m-0 text-sm">
                        <?php echo $location_name ?><br><span class="whitespace-pre-line"><?php echo $address ?></span>
                    </p>   
                    <button class="btn col-span-2">View Club Link</button>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
 
</div>




        