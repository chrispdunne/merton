<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

?>

<article id="post-<?php the_ID(); ?>">

	<?php get_template_part( 'src/templates/page/hero' ); ?>
	<?php get_template_part( 'src/templates/page/slideshow' ); ?>
	<?php get_template_part( 'src/templates/page/acf-content' ); ?>
	<div class="max-w-7xl my-12 mx-auto px-12"><?php the_content() ?></div>
	<?php get_template_part( 'src/templates/downloads' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
