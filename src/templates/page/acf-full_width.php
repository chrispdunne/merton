<div class="full_width <?php if ( $args['background_color'] ) echo strtolower( $args['background_color'] ) ?>-bg">
<div class="max-w-4xl mx-auto py-24 px-6">
<?php if ( $args['title'] ) :
    echo '<h2 class="text-center text-2xl mb-12">' . $args['title'] . '</h2>';
endif; ?>
<?php if ( $args['text'] ) :
    echo '<div class="text-center whitespace-pre-line">' . $args['text'] . '</div>';
endif; ?>
<?php if ( $args['icon_list'] ) :
    echo '<div class="max-w-2xl mx-auto">';
    foreach ( $args['icon_list'] as $icon ) {
        echo '<div class="flex my-6">';
        echo '<div class="mr-4">';
        echo '<img src="' . wp_get_attachment_image_url( $icon['icon'] ) . '" >';
        echo '</div>';
        echo '<div class="icon-list-item-text">';
        echo '<h3 class="text-md">' . esc_html( $icon['title'] ) . '</h3>';
        echo '<p class="text-sm">' . esc_html( $icon['text'] ) . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
endif; ?>
</div>
</div>