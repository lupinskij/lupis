<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php else: ?>

	<?php //article ?>
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h2>
	</article>
	<?php //article ?>

<?php endif; ?>


<?php get_footer(); ?>