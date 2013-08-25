<?php get_header(); ?>
	
<?php //section ?>
	<section role="main">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<?php //article ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php //post thumbnail ?>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			<?php //post thumbnail ?>
			
			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<?php //post title ?>
			
			<?php //post details ?>
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'lupis' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'lupis' ), __( '1 Comment', 'lupis' ), __( '% Comments', 'lupis' )); ?></span>
			<?php //post details ?>
			
			<?php the_content(); // Dynamic Content ?>
			
			<?php the_tags( __( 'Tags: ', 'lupis' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
			
			<p><?php _e( 'Categorised in: ', 'lupis' ); the_category(', '); // Separated by commas ?></p>
			
			<p><?php _e( 'This post was written by ', 'lupis' ); the_author(); ?></p>
			
			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			
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