<?php get_header(); ?>

  <!-- section -->
  <section role="main">

    <h1><?php _e( 'Categories for', 'lupis' ); the_category(); ?></h1>

    <br>

    <?php get_template_part('loop'); ?>

    <?php get_template_part('pagination'); ?>

  </section>
  <!-- /section -->

<?php get_footer(); ?>