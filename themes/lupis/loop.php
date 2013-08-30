<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<?php //article ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
		
		<section class="port-thumbnail">	
			<?php //post thumbnail ?>
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
				</a>
			<?php endif; ?>
			<?php //post thumbnail ?>
		</section>

		<section class="port-info">
			<?php //post details ?>
			<div class="date">
				<i class="clock">&#128340;</i>
				<span><?php the_time('F j, Y'); ?></span>
			</div>
			<?php //post details ?>
			
			<?php //post title ?>
			<h3 class="post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php //post title ?>
			
			<?php lupisWP_excerpt('lupisWP_index'); ?>
			
			<?php edit_post_link(); ?>
		</section>
		
	</article>
	<?php //article ?>
	
<?php endwhile; ?>

<?php else: ?>

	<?php //article ?>
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h2>
	</article>
	<?php //article ?>

<?php endif; ?>