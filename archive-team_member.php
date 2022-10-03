<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
 
            get_template_part( 'src/templates/hero-archive', get_post_type() ); ?>
			
            <div class="max-w-7xl mx-auto my-12">
		
			<?php /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'src/templates/loop', get_post_type() );

			endwhile;  ?>
            </div>
			<div class="flex max-w-5xl mx-auto post-next-prev mb-8 gap-4">
			<?php posts_nav_link(  ' | ',   '<< Previous',   'Next >>' ); ?>
			</div>

		<?php else :

			get_template_part( 'src/templates/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
 
get_footer();
