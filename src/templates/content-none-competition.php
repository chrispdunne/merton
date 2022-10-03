<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merton
 */

?>

<section class="no-results not-found">
    <?php 
        get_template_part( 'src/templates/hero-archive', get_archive_no_posts_type() ); 
        get_template_part( 'src/templates/filters', get_archive_no_posts_type() ); 
    ?>

    <div class="max-w-5xl mx-auto my-12 text-center"> 
        No competitions found
    </div>		 
</section><!-- .no-results -->
