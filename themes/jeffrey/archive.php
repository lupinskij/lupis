<?php get_header(); ?>

  <!-- section -->
  <section role="main">

    <h1><?php single_tag_title(); ?></h1>

    <br>

    <?php get_template_part('loop'); ?>

    <?php get_template_part('pagination'); ?>

  </section>
  <!-- /section -->

<?php get_footer(); ?>