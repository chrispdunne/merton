<?php
$slideshow = get_field( 'slides' );
// echo '<pre>' . print_r( $slideshow, true ) . '</pre>';
if ( $slideshow ) {
    echo '<div class="slideshow">';
    echo '<div class="slideshow-inner">';
    foreach ( $slideshow as $key => $slide ) {

        echo '<div id="slide-' . $key . '" class="slide" style="background-image: url(' . $slide['image']['url'] . ')">';
        echo '<a class="slide-inner" href="' . $slide['link'] . '">';
        echo '<div class="slide-content">';
        echo '<div class="slide-content-inner  text-center">';
        echo '<h2 class="text-2xl font-bold">' . $slide['title'] . '</h2>';
        echo '<p class="text-md">' . $slide['tagline'] . '</p>';
  
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';

    echo '<div class="slide-controls text-center absolute left-1/2	">';
    foreach ( $slideshow as $key => $slide ) {
        $first_item_class = $key === 0 ? ' active' : '';
        echo '<a class="slide-controls__button' . $first_item_class . '" data-index="' . $key . '" href="#slide-' . $key . '"></a>';
    }
    echo '</div>';
}