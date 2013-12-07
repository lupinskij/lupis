<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <?php //article ?>

	<div id="post-<?php the_ID(); ?>" class="port-thumbnail" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	  <?php //post thumbnail ?>
	  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>

	  <a <?php if (get_the_content()) { ?> href="<?php the_permalink(); ?>" <?php } ?>>

	    <?php the_post_thumbnail('full', array('class' => 'lazy-img')); ?>

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
	</div><?php //post thumbnail ?>

<?php endwhile; ?>

<?php else: ?>

	<?php //article ?>
	<div>
		<h2><?php _e( 'Sorry, nothing to display.', 'lupis' ); ?></h2>
	</div>
	<?php //article ?>

<?php endif; ?>