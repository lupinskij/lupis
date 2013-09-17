<?php get_header(); ?>

<section class="page-content">
	<?php //article ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<h1 class="page-title"><?php the_title(); ?></h1>

	<article id="post-<?php the_ID(); ?>" class="contact-form col-half" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

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

	<aside class="sidebar widget-area col-half" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<div class="location">
			<img itemprop="image" src="<?php bloginfo('template_directory'); ?>/img/map.png" class="map" alt="Map of Providence, RI">
			<span class="point">
			  <span class="glow pulse"></span>
			</span>
		</div>
	</aside>

</section>


<?php get_footer(); ?>