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

	<?php get_template_part( 'src/templates/hero' ); ?>
	<?php get_template_part( 'src/templates/page/slideshow' ); ?>
	<?php get_template_part( 'src/templates/page/acf-content' ); ?>
	<?php if (!is_front_page() ) : ?><div class="max-w-7xl my-12 mx-auto px-12"><?php the_content() ?></div><?php endif; ?>
	<?php get_template_part( 'src/templates/downloads' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
