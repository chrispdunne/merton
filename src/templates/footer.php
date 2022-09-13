<div class="purple-bg text-center py-12">
	<a href="/about/vision-and-purpose">Click here to read our Vision and Purpose</a>
</div>

<div class="grey-bg pb-12 px-6">
	<div class="flex max-w-7xl mx-auto font-light">

		<?php 	 
		for ( $i = 3; $i <= 6; $i++ ) : ?>
		<div class="flex-1">
		<h3 class='font-bold my-6 text-white'><?php echo wp_get_nav_menu_name( 'menu-' . $i ) ?></h3>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => "menu-$i",
				)
			);
		?>
		</div>
		<?php endfor; ?>
	</div>
</div>
<div class="grey-bg text-xs border-t border-1 py-6 px-6">
	<div class="max-w-7xl mx-auto flex justify-between items-center">
		<div class="font-light">&copy;<?php date('Y') ?> Merton School Sport Partnership. Website by Lightning Pixels</div>
		<div>
		<?php
			wp_nav_menu(
				array(
					'menu_class'		=> 'flex footer-menu',
					'theme_location' 	=> 'menu-7',
					'container' 		=> false
				)
			);
		?>
		</div>
	</div>
</div>
