<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

?>

<article id="post-<?php the_ID(); ?>">
	
	<div class="max-w-5xl mx-auto py-12 flex flex-row-reverse">

		<?php get_template_part( 'src/templates/sidebar', null, [ 'template_content' => 'src/templates/competition/details' ] ) ?>

		<div class="entry-content w-2/3 mr-12">
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
	<?php get_template_part( 'src/templates/form/competition' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
