<?php
 
get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
			
            get_template_part( 'src/templates/hero', get_post_type(), ['date' => get_the_date() ] );
		 
			/* Start the Loop */
			while ( have_posts() ) :
                
				the_post(); 
                
                get_template_part( 'src/templates/content', get_post_type() );

            endwhile;

		else :

			get_template_part( 'src/templates/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
 
get_footer();
