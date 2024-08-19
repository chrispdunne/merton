<article id="post-<?php the_ID(); ?>">
	
	<div class="max-w-5xl mx-auto py-12 md:flex flex-row-reverse">

		<?php get_template_part( 
            'src/templates/sidebar', 
            null, 
            [ 'template_content' => 'src/templates/school/details' ] ) ?>

		<div class="entry-content md:w-2/3 md:mr-12 p-5">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'merton' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			); 
			?>
		</div><!-- .entry-content -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
