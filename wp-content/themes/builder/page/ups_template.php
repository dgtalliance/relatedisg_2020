<?php 
/*
Template Name: USP Home
*/
get_header(); ?>

<div class="wrap-preloader">
  <div class="item-wrap-preloader">
    <?php idx_the_custom_logo_header_boots(); ?>
    <span class="preloader-icon"></span>
  </div>
</div>

<!--
Nota: basic-content es una clase creada solo para darle un formato vistoso a la presentación de esta demo, no es necesario trabajar con esta clase
-->
<main class="lg-main">
  <img src="<?php echo get_template_directory_uri(); ?>/images/bg.jpg" class="lg-layer">
</main>

<section class="basic-content">
  <h2 class="basic-content-title">Shortcode Colección de Neighborhoods</h2>
  <?php echo do_shortcode('[tg_neighboardhood_group link="http://betaidxb.staging.wpengine.com/arts-district/"]'); ?>
</section>

<section class="basic-content">
  <h2 class="basic-content-title">Shortcode Colección de Buildings</h2>
  <?php echo do_shortcode('[idx_buildings_featured mode="slider"]') ?>
</section>

<section class="home-contact basic-content">
  <div class="home-contact-wrap-image">
    <img src="<?php echo get_template_directory_uri(); ?>/images/bg.jpg">
  </div>
  <div class="home-contact-wrap-form">
    <?php echo do_shortcode('[flex_idx_contact_form]'); ?>
    <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="<?php echo $idx_contact_email; ?>">
    <button class="close-modal-ct">Close<span></span></button>
  </div>
  <div class="overlay_modal_ct"></div>
</section>

<section class="basic-content">
  <h2 class="basic-content-title">Shortcode Testimoniales</h2>
  <?php echo do_shortcode('[dgt_shortcode_testimonial_short posts_per_page="3" post_type="dgt-testimonial"]'); ?>
</section>

<!--
<section class="basic-content">
  <h2 class="basic-content-title">Shortcode Colección de Neighborhoods con mapa</h2>
  <?php //echo do_shortcode('[IDX_NEIGHBORHOODS]');?>
</section>-->


<!-- MODAL DE CONTACTO USP -->
<div class="overlay_modal ppc-contact" id="modal_contact_us">
  <div class="modal_cm">
    <button data-id="modal_contact_us" class="close close-modal" data-frame="modal_mobile">Close <span></span></button>
    <div class="content_md">
      <div class="heder_md">
        <h2>Connect with ...</h2>
      </div>
      <div class="body_md">
        <?php echo do_shortcode('[flex_idx_contact_form id_form="contact_modal_usp"]'); ?>
        <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="<?php echo $idx_contact_email; ?>">
      </div>
    </div>
  </div>
  <div class="overlay_modal_closer" data-frame="modal_mobile" data-id="modal_calculator"></div>
</div>
<!-- MODAL DE CONTACTO USP -->

<?php get_footer();?>

<script type="text/javascript">
  jQuery("header").addClass("header-home");
</script>