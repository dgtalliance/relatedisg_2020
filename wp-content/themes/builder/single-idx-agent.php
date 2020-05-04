<?php
/**
 * Template Name: Single IDX Agent
 * Template Post Type: page
 */
get_header('idx-agents');
global $post, $flex_idx_info;

$agent_registration_key = get_post_meta($post->ID, "_flex_agent_registration_key", true);
$agent_page_slug = $post->post_name;
?>

<?php if (isset($agent_registration_key) && !empty($agent_registration_key)): ?>
  <script>
    var IB_AGENT_REGISTRATION_KEY = "<?php echo $agent_registration_key; ?>";
    console.log(IB_AGENT_REGISTRATION_KEY);
  </script>
<?php endif; ?>

<main id="agent">
  <section id="welcome" class="ms-section ms-animate">
    <h1 class="ms-title">Brickell & Downtown <span>Miami Condos</span></h1>
    <h2 class="ms-subtitle">#1 resource for brickell & downtown miami condos</h2>
    <div class="ms-wrap-btn">
      <a href="#" class="ms-btn active" title="buy"><span>buy</span></a>
      <a href="#" class="ms-btn" title="rent"><span>rent</span></a>
    </div>
    <?php echo do_shortcode('[flex_autocomplete registration_key="'.$agent_registration_key.'" agent_page_slug="'.$agent_page_slug.'"]'); ?>

    <div class="ms-slider">
      <div class="gs-container-slider clidxboost-main-slider" data-gs='{"nav": true, "autoplay": true, "autoPlaySpeed": 4000}'>
        <?php
        if (false === get_theme_mod('idx_image_slider')) {
          $idx_image_slider = [];
        } else {
          $idx_image_slider = get_theme_mod('idx_image_slider');
        }
        $aum = 0;
        ksort($idx_image_slider);
        foreach ($idx_image_slider as $key_slider => $value_slider) {
          if (!empty($value_slider['thumb'])) { ?>
            <img class="ms-img ms-lazy" data-real-type="image" data-img="<?php echo $value_slider['thumb']; ?>" alt="<?php echo get_the_title();?>">
        <?php } ?>
        <?php  $aum = $aum+1; }  ?>
      </div>
    </div>
    <!--
    aqui dejo la estructura para el video, solo se debe reemplazar la url del video en el atributo data-img  
    <div class="ms-wrp-video">
      <div class="ms-video-foreground" data-real-type="agentVideo" data-img="https://vimeo.com/315355170"></div>
    </div>
    -->

    <button class="ms-next-step" data-step="#featured-properties" aria-label="Skip to main content">
      <div class="chevron"></div>
      <div class="chevron"></div>
      <div class="chevron"></div>
    </button>
  </section>

  <section id="listings" class="ms-section ms-animate">
    <h2 class="ms-title">Featured Properties</h2>
    <div class="ms-wrap-slider">
    <?php
      $filter_featured_page_token = flex_filter_has_featured_page();
      if (null !== $filter_featured_page_token) {
        echo do_shortcode(sprintf('[flex_idx_filter id="%s" type="2" slider_item="4" slider_play="1" slider_speed="5000" mode="slider" limit="8"]', $filter_featured_page_token));
      }
    ?>
    </div>
    <div class="ms-wrap-btn">
      <a href="#" class="ms-btn" title="View all Listings">
        <span>View all Listings</span>
      </a>
    </div>
  </section>
  <hr class="ms-hr"/>

  <section id="developments" class="ms-section ms-animate">
    <h2 class="ms-title">Top Luxury Real Estate Top Producer in the Area</h2>
    <div class="ms-wrap-slider">
      <div class="ms-slider" id="developments-slider">
        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/1.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Alton Bay">
          </div>
          <h3 class="ms-item-title">Alton <span>Bay</span></h3>
        </div>
        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/2.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Reach and Rise, Residences at Brickell City Center">
          </div>
          <h3 class="ms-item-title">Reach and Rise, Residences at <span>Brickell City Center</span></h3>
        </div>
        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/3.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Hyde Beach Hollywood">
          </div>
          <h3 class="ms-item-title">Hyde Beach <span>Hollywood</span></h3>
        </div>
        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/4.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="Muse Sunny Isles">
          </div>
          <h3 class="ms-item-title">Muse <span>Sunny Isles</span></h3>
        </div>
        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/5.PNG" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-layer ms-lazy" alt="The Residences At w Fort Lauderdale">
          </div>
          <h3 class="ms-item-title">The Residences <span>At w Fort Lauderdale</span></h3>
        </div>
      </div>
    </div>
    <div class="ms-wrap-btn">
      <a href="#" class="ms-btn" title="View all Listings">
        <span>View all Developments</span>
      </a>
    </div>
  </section>

  <section id="profile" class="ms-animate">
    <article class="ms-section">
      <h2 class="ms-title">Rowena Luna</h2>
      <h3 class="ms-sb-title">Luxury Real Estate</h3>
      <ul class="ms-contact">
        <li>Office: <a href="tel:(305) 877-4500">(305) 877-4500</a></li>
        <li>Cell: <a href="tel:305.962.6510">305.962.6510</a></li>
        <li>Email: <a href="mailto:realtoraldorivera@yahoo.com">realtoraldorivera@yahoo.com</a></li>
      </ul>
      <p>Aldo Rivera was born in Zaragoza, Spain and raised in Puerto Rico. He has resided in Miami for over 16 years and attended Florida International University where he received a Bachelor Degree in Hospitality Management. For the past 12 years, Aldo has been committed to Residential Real Estate. He has served as an in-house Sales Agent for pre-construction projects such as The Plaza on Brickell & Le Parc at Brickell. He has worked for Cervera Real Estate & Brilliance Realty Group and then joined RelatedISG International Realty as a Realtor Associate.</p>
      <a class="ms-btn" href="#" aria-label="Learn more">
        <span>Learn more</span>
      </a>
      <div class="ms-wrap-img">
        <img class="ms-lazy" data-real-type="image" data-img="http://betarelatedisg.staging.wpengine.com/wp-content/uploads/2018/05/rowena.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Our Culture">
      </div>
    </article>
  </section>

  <section id="signUpSection" class="ms-section ms-animate">
    <div class="ms-wrap-section">
      <div class="ms-wrap-detail">
        <h2 class="ms-title">Sign up and power <span>your next move</span></h2>
        <p>Claim your free RelatedISG account to save your favorite listings and searches, access listing details, and work with an agent.</p>
        <button class="ms-btn" aria-label="Sign Up">
          <span>Sign Up</span>
        </button>
      </div>
      <div class="ms-wrap-img">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/home/iphone.png" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Sign up and power your next move">
      </div>
    </div>
  </section>

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

<?php get_footer('idx-agents');?>