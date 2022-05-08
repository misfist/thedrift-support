<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Drift
 */

get_header(); ?>

<main id="main" class="main-content" role="main">
	<div class="container main_container_custom">

		<?php do_action( 'drift_after_main_container' ); ?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'page' );

		endwhile; // End the loop.
		?>
	
	</div><!-- .container -->
</main><!-- .main-content -->
<?php 
get_footer();