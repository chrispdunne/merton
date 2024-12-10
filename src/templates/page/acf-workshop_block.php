
<div class="py-12 light-grey-bg">
<h2 class="text-center text-2xl font-bold my-8">Upcoming Workshops</h2>
<?php
$date_now = date('Y-m-d');
 
$workshops = get_posts( 
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
        'post_type'        => 'workshop',
        'suppress_filters' => true
    ]
);
if ( $workshops ) {
    echo '<div class="text-center">';
    echo '<div class="px-4 lg:px-0  max-w-5xl mx-auto md:grid gap-4 grid-cols-3">';

    foreach ( $workshops as $workshop ) {
        get_template_part( 'src/templates/loop', null, [ 'ID' => $workshop->ID, 'excerpt' => false, 'button'=>false] );
    }
    echo '</div>';
    echo '<div><a class="btn mt-8" href="';
    echo get_post_type_archive_link( 'workshop' );
    echo '">View all workshops</a></div>';
    echo '</div>';
}   ?>
</div><!--/workshop block-->

 

 