<?php get_header(); ?>

<section class="page-content">
	<?php //article ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>
	
	<article id="post-<?php the_ID(); ?>" class="" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php else: ?>

		<?php //article ?>
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h2>
		</article>
		<?php //article ?>

	<?php endif; ?>

	</article>

</section>


<?php get_footer(); ?>