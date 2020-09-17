<?php 
/*
Template Name: Video Gallery
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="video-page">
  <section class="ms-section ms-animate" id="ms-video-page">
    <h2 class="ms-title">RELATEDISG <span>Website / CRM Tutorials</span></h2>
    <?php echo do_shortcode('[lazy_videos]');?>
  </section>
</main>

<?php endwhile; get_footer(); ?> 