<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
		<?php query_posts("page_id=10"); ?>

		<?php while ( have_posts() ) : the_post(); ?> 
			<div class="category-intro">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		
		<?php query_posts("cat=3"); ?>

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php query_posts("page_id=10"); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_field('exhibition_secondary_content'); ?>

		<?php endwhile; // end of the loop. ?>
		
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>