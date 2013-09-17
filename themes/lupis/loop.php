<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <?php //article ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<section class="port-thumbnail">
	  <?php //post thumbnail ?>
	  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>

	  <a <?php if (get_the_content()) { ?> href="<?php the_permalink(); ?>" <?php } ?>>

	    <?php the_post_thumbnail('full'); // Declare pixel size you need inside the array ?>

	    <div class="overlay">
	      <?php if (get_field('external_link')) : ?>
	      <div class="link icon" title="See this site in it's natural habitat." data-url="<?php the_field('external_link'); ?>">🔗</div>
	      <?php endif; ?>

	      <?php if (get_the_content()) : ?>
	      <div class="look icon" title="Read the project brief."></div>
	      <?php endif; ?>

	    </div><?php //.overlay ?>
	  </a>
	  <?php endif; ?>
	</section><?php //post thumbnail ?>

	<section class="port-info">
		<?php //post details ?>
		<div class="date">
			<i class="clock">&#128340;</i>
			<span><?php the_time('F j, Y'); ?></span>
		</div>
		<?php //post details ?>

		<?php //post title ?>
		<h3 class="post-title">
			<?php the_title(); ?>
		</h3>
		<?php //post title ?>

		<?php the_field('excerpt'); ?>

		<div class="tags"><?php the_tags( __( '', 'lupis' ), ', ', ''); // Separated by commas with a line break at the end ?></div>
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