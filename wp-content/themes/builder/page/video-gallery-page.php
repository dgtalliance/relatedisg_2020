<?php 
/*
Template Name: Video Gallery
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<style>
  youtube {
    background-color: #000;
    margin-bottom: 30px;
    position: relative;
    padding-top: 56.25%;
    overflow: hidden;
    cursor: pointer;
}
.youtube img {
    width: 100%;
    top: -16.82%;
    left: 0;
    opacity: 0.7;
}
.youtube .play-button {
    width: 90px;
    height: 60px;
    background-color: #333;
    box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
    z-index: 1;
    opacity: 0.8;
    border-radius: 6px;
}
.youtube .play-button:before {
    content: "";
    border-style: solid;
    border-width: 15px 0 15px 26.0px;
    border-color: transparent transparent transparent #fff;
}
.youtube img,
.youtube .play-button {
    cursor: pointer;
}
.youtube img,
.youtube iframe,
.youtube .play-button,
.youtube .play-button:before {
    position: absolute;
}
.youtube .play-button,
.youtube .play-button:before {
    top: 50%;
    left: 50%;
    transform: translate3d( -50%, -50%, 0 );
}
.youtube iframe {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
  }
</style>

<main id="video-page">

  <section class="ms-section ms-animate" id="ms-video-page">
    <h2 class="ms-title"><?php the_title() ?></h2>
    <?php
    echo do_shortcode('[lazy_videos]');
    ?>
  </section>

</main>

<?php endwhile; get_footer(); ?> 