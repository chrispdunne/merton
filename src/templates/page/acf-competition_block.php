<?php
$date_now = date('Y-m-d');
 
$competitions = get_posts( 
    [
        'numberposts'      => 3,
        'category'         => 0,
        'orderby'          => 'meta_value',
        'order'            => 'ASC',
        'include'          => array(),
        'exclude'          => array(),
        'meta_key'         => 'start_datetime',
        'meta_query'       => [
            [
                'key' => 'start_datetime',
                'value' => $date_now . ' 00:00:00',
                'compare' => '>=',
            ]
        ],
        'post_type'        => 'competition',
        'suppress_filters' => true
    ]
);
if ( $competitions ) {
    echo '<div class="text-center light-grey-bg py-12">';
    echo '<div class="px-4 lg:px-0  max-w-5xl mx-auto md:grid gap-4 grid-cols-3">';

    foreach ( $competitions as $comp ) {
        get_template_part( 'src/templates/loop', null, [ 'ID' => $comp->ID, 'excerpt' => false, 'button'=>false] );
    }
    echo '</div>';
    echo '<div><a class="btn mt-8" href="';
    echo get_post_type_archive_link( 'competition' );
    echo '">View all competitions</a></div>';
    echo '</div>';
}  

 

 