<?php get_header(); ?>
	
<?php //section ?>
	<section role="main">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<?php //article ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1 class="page-title"><?php the_title(); ?></h1>
			
			<?php the_content(); // Dynamic Content ?>
		
		</article>
		<?php //article ?>
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
	<?php //article ?>
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h1>
			
		</article>
		<?php //article ?>
	
	<?php endif; ?>
	
	</section>
	<?php //section ?>
	

<?php get_footer(); ?>