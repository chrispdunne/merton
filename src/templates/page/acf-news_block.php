<div class="my-12">
<h2 class="text-center text-2xl font-bold my-8">Latest News</h2>
<?php
$posts = get_posts( 
    [
        'numberposts'      => 3,
        // 'category'         => 0,
        // 'orderby'          => 'date',
        // 'order'            => 'DESC',
        // 'include'          => array(),
        // 'exclude'          => array(),
        // 'meta_key'         => '',
        // 'meta_value'       => '',
        // 'post_type'        => 'post',
        // 'suppress_filters' => true
    ]
);
if ( $posts ) {
    echo '<div class="">';
    echo '<div class="max-w-5xl flex mx-auto gap-4">';
    foreach ( $posts as $key => $post ) {
        $date = date( 'F j, Y', strtotime( $post->post_date ) );

  
        echo '<a class="flex flex-col items-start" href="' . get_permalink( $post->ID ) . '">';
        echo get_the_post_thumbnail( $post->ID, 'large' );
        echo "<small class='w-full text-xs py-2'>$date</small>";
        echo "<h4 class='font-bold py-2'>$post->post_title</h4>";    
        echo "<span class='btn btn-sm btn-teal my-4'>Read More</span>";
        echo "</a>";
 
    }
    echo '</div>';
    echo '</div>';

    
}
get_template_part( 'src/templates/page/twitter' ); ?>
</div><!--/news block-->
