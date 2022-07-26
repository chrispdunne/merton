<?php
$competitions = get_posts( 
    [
        'numberposts'      => 3,
        'category'         => 0,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => array(),
        'exclude'          => array(),
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'competition',
        'suppress_filters' => true
    ]
);
if ( $competitions ) {
    echo '<div class="text-center light-grey-bg py-12">';
    echo '<div class="max-w-3xl mx-auto px-12">';

    foreach ( $competitions as $comp ) {
        echo "<h4 class='font-bold mb-6'>$comp->post_title</h4>";
        echo "<p class='text-sm'>" . get_the_excerpt( $comp ) . "</p>";
        echo "<a class='mt-6 btn btn--green btn-sm' href='" . get_permalink( $comp->ID ) . "'>Read More</a>";
    }
    echo '</div>';
    echo '</div>';
}  