<div class="purple-bg text-center py-12">
	<a href="/about/vision-and-purpose">Click here to read our Vision and Purpose</a>
</div>

<div class="grey-bg pb-12 px-6">
	<div class="lg:flex text-center lg:text-left max-w-7xl mx-auto font-light">

		<?php 	 
		for ( $i = 3; $i <= 6; $i++ ) : ?>
		<div class="flex-1 mb-4">
		<h3 class='font-bold my-0 py-4 lg:py-0 lg:my-6 text-white'><?php echo wp_get_nav_menu_name( 'menu-' . $i ) ?></h3>
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
<div class="grey-bg text-xs border-t border-1 py-6 px-6 text-center">
	<div class="max-w-7xl mx-auto lg:flex justify-between items-center">
		<div class="font-light">&copy;<?php date('Y') ?> 
			Merton School Sport Partnership. 
			Website by <a href="https://lightningpixels.co.uk" target="_blank" rel="noopener noreferrer">Lightning Pixels</a>
		</div>
		<div class="inline-block mt-6">
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
<?php wp_footer() ;?>
