<div class="my-12">
<h2 class="text-center text-2xl font-bold my-8">Latest News</h2>
<?php
$posts = get_posts( 
    [
        'numberposts'      => 3
    ]
);
if ( $posts ) {
    echo '<div class="">';
    echo '<div class="max-w-5xl flex mx-auto gap-4">';
    foreach ( $posts as $key => $post ) {
        $date = merton_date( $post->post_date );
  
        echo '<a class="flex flex-col items-start flex-1" href="' . get_permalink( $post->ID ) . '">';
        echo '<div class="h-48 w-full bg-cover bg-center" style="background-image: url( ' .get_the_post_thumbnail_url( $post->ID, 'large' ) . ')"></div>';
        echo "<small class='w-full text-xs py-2'>$date</small>";
        echo "<h4 class='font-bold py-2'>$post->post_title</h4>";    
        echo "<span class='btn btn-sm btn-green my-4'>Read More</span>";
        echo "</a>";
 
    }
    echo '</div>';
    echo '</div>';

    
}
get_template_part( 'src/templates/page/twitter' ); ?>
</div><!--/news block-->
