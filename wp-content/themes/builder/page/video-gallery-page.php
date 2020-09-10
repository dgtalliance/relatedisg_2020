<?php 
/*
Template Name: Video Gallery
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="video-page">

<section class="ms-section ms-animate" id="ms-video-page">
    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/contact/contact-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="We are here for you">
    </div>
    <h2 class="ms-title"><?php the_title() ?></h2>
    <?php
    echo do_shortcode('[lazy_videos]');
    ?>
  </section>
</main>

<?php endwhile; get_footer(); ?> 