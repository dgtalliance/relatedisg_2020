<?php get_header(); ?>

<!--<div class="wrap-preloader">
  <div class="item-wrap-preloader">
    <?php idx_the_custom_logo_header(); ?>
    <span class="preloader-icon"></span>
  </div>
</div>-->

<main>
  <section id="welcome" class="ms-section ms-animate">
    <h1 class="ms-title">Find what <span>moves you.</span></h1>
    <div class="ms-wrap-btn">
      <button class="ms-btn js-btn-sell-rent active" title="Buy" data-value="0"><span>buy</span></button>
      <button class="ms-btn js-btn-sell-rent" title="Rent" data-value="1"><span>Rent</span></button>
    </div>
    <?php echo do_shortcode('[flex_autocomplete]'); ?>

    <div class="ms-slider">
      <div class="gs-container-slider clidxboost-main-slider" data-gs='{"nav": true, "autoplay": true, "autoPlaySpeed": 4000}'>
        <?php
        if (false === get_theme_mod('idx_image_slider')) {
          $idx_image_slider = [];
        } else {
          $idx_image_slider = get_theme_mod('idx_image_slider');
        }
        $aum=0;
        ksort($idx_image_slider);
        foreach ($idx_image_slider as $key_slider => $value_slider) {
          if (!empty($value_slider['thumb'])) { ?>
            <img class="ms-img ms-lazy" data-real-type="image" data-img="<?php echo $value_slider['thumb']; ?>" alt="<?php echo get_the_title();?>">
        <?php } ?>
        <?php  $aum=$aum+1; }  ?>
      </div>
    </div>

    <button class="ms-next-step" data-step="#listings" aria-label="Skip to main content">
      <div class="chevron"></div>
      <div class="chevron"></div>
      <div class="chevron"></div>
    </button>

  </section>

  <section id="listings" class="ms-section ms-animate">
    <h2 class="ms-title">New to the Market</h2>
    <div class="ms-wrap-slider">
    <?php
      $filter_featured_page_token = flex_filter_has_featured_page();
      if (null !== $filter_featured_page_token) {
        echo do_shortcode(sprintf('[flex_idx_filter id="%s" type="2" slider_item="4" slider_play="1" slider_speed="5000" mode="slider" limit="8"]', $filter_featured_page_token));
      }
    ?>
    </div>
    <div class="ms-wrap-btn">
      <a href="/exclusive-listing/" class="ms-btn" title="View all Listings">
        <span>View all Listings</span>
      </a>
    </div>
  </section>
  <hr class="ms-hr"/>

  <section id="developments" class="ms-section ms-animate">
    <h2 class="ms-title">Exclusive Developments</h2>
    <div class="ms-wrap-slider">
      <div class="ms-slider" id="developments-slider">
        <a href="/building/alton-bay/" class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/1.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Alton Bay">
          </div>
          <h3 class="ms-item-title">Alton <span>Bay</span></h3>
        </a>
        <a href="/building/reach-rise-residences-at-brickell-city-centre/" class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/2.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Reach and Rise, Residences at Brickell City Center">
          </div>
          <h3 class="ms-item-title">Reach and Rise, Residences at <span>Brickell City Center</span></h3>
        </a>
        <a href="/building/the-residences-at-hyde-beach-house/" class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/3.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Hyde Beach Hollywood">
          </div>
          <h3 class="ms-item-title">Hyde Beach <span>Hollywood</span></h3>
        </a>
        <a href="/building/muse/" class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/4.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Muse Sunny Isles">
          </div>
          <h3 class="ms-item-title">Muse <span>Sunny Isles</span></h3>
        </a>
        <a href="/building/w-residences-fort-lauderdale/" class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/5.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="The Residences At w Fort Lauderdale">
          </div>
          <h3 class="ms-item-title">The Residences <span>At w Fort Lauderdale</span></h3>
        </a>
      </div>
    </div>
    <div class="ms-wrap-btn">
      <a href="/developments/" class="ms-btn" title="View all Developments">
        <span>View all Developments</span>
      </a>
    </div>
  </section>

  <div id="signUpSection" class="ms-section ms-animate">
    <div class="ms-wrap-section">
      <div class="ms-wrap-detail">
        <h2 class="ms-title">Sign up and power <span>your next move</span></h2>
        <p>Claim your free RelatedISG account to save your favorite listings and searches, access listing details, and work with an agent.</p>
        <div class="ms-wrap-btn">
          <button class="ms-btn js-btn-signup" aria-label="Sign Up">
            <span>Sign Up</span>
          </button>
        </div>
      </div>
      <div class="ms-wrap-img">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/iphone.png" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Sign up and power your next move">
      </div>
    </div>
  </div>

  <section id="contactUs" class="ms-section ms-animate">
    <h2 class="ms-title">Contact Us</h2>
    <div class="ms-wrap-section">
      <h3 class="ms-wrap-title">Need help? We are here for you.</h3>
      <p>Please complete the form below and one of our expert agents will contact you.</p>
      <?php echo do_shortcode('[flex_idx_contact_form]'); ?>
      <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="">
      <script type="text/javascript">
        jQuery(".flex-content-form .pt-name .medium").attr('placeholder','First Name*');
        jQuery(".flex-content-form .pt-lname .medium").attr('placeholder','Last Name*');
        jQuery(".flex-content-form .pt-email .medium").attr('placeholder','E-mail Address*');
        jQuery(".flex-content-form .pt-phone .medium").attr('placeholder','Phone Number');
        jQuery(".flex-content-form .textarea").attr('placeholder','Type your message here');
      </script>
    </div>
  </section>

</main>
<?php get_footer();?>
