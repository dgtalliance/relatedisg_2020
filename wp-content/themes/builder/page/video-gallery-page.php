<?php 
/*
Template Name: Video Gallery
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="video-page">

  <section class="ms-section ms-animate" id="about-us">
    <h2 class="ms-st-title"><?php the_title() ?></h2>
    <?php
    echo do_shortcode('[lazy_videos]');
    ?>
  </section>

</main>

<?php endwhile; get_footer(); ?> 