<div class="full_width <?php if ( $args['background_color'] ) echo strtolower( $args['background_color'] ) ?>-bg">full width
<?php if ( $args['title'] ) :
    echo '<h2 class="text-center text-2xl">' . $args['title'] . '</h2>';
endif; ?>
<?php if ( $args['text'] ) :
    echo '<div class="text-center">' . $args['text'] . '</div>';
endif; ?>
<?php if ( $args['icon_list'] ) :
    foreach ( $args['icon_list'] as $icon ) {
        // echo '<pre>' . print_r( $icon, true ) . '</pre>';
        echo '<div class="icon-list-item">';
        echo '<div class="icon-list-item-icon">';
        echo '<img src="' . wp_get_attachment_image_url( $icon['icon'] ) . '" >';
        echo '</div>';
        echo '<div class="icon-list-item-text">';
        echo '<h3 class="text-md">' . $icon['title'] . '</h3>';
        echo '<p class="text-sm">' . $icon['text'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
endif; ?>

 </div>