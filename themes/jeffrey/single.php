<?php get_header(); ?>

<?php //div ?>
  <div role="main">

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <section class="project-info">

    <div class="wrap">

      <h2 class="page-title"><?php the_title(); ?></h2>

      <div class="project-about project-description">
        <h3>About the project</h3>
        <p><?php the_field('project_about'); ?></p>
      </div>

      <div class="project-role project-description">
        <h3>My role</h3>
        <p><?php the_field('project_role'); ?></p>
      </div>

    </div> <?php //end wrap ?>

  </section> <?php //End Project Info ?>

  <?php //article ?>
    <article id="post-<?php the_ID(); ?>" class="project-shots <?php post_class(); ?>">
      <div class="project-shots-wrap">

      <?php the_content(); // Dynamic Content ?>

      </div>
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

  </div>
  <?php //div ?>


<?php get_footer(); ?>