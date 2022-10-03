<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'max-w-5xl mx-auto my-12' ); ?>>

	<div class="entry-content">
		<?php
        get_template_part( 'src/templates/generic/location' );
        get_template_part( 'src/templates/generic/email' );
        get_template_part( 'src/templates/generic/phone' );
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

</article><!-- #post-<?php the_ID(); ?> -->
