<?php get_header(); ?>
	
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<?php //article ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content(); ?>
			
			<?php comments_template( '', true ); // Remove if you don't want comments ?>
			
			<br class="clear">
			
			<?php edit_post_link(); ?>
			
		</section>
		<?php //article ?>
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<?php //article ?>
		<section>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h2>
			
		</section>
		<?php //article ?>
	
	<?php endif; ?>

	
<?php get_sidebar(); ?>

<?php get_footer(); ?>