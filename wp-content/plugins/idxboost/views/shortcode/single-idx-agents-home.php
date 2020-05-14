<?php
get_header('idx-agents');

global $post, $flex_idx_info;

$agent_registration_key = get_post_meta($post->ID, "_flex_agent_registration_key", true);
$agent_page_slug = $post->post_name;
$agent_full_info = [];

if ("idx-agents" === $post->post_type) {
  list($agent_name) = explode("/", $wp->request);
  $agent_full_slugname = implode("/", [site_url(), $agent_name]);
}

?>

<?php if (isset($agent_registration_key) && !empty($agent_registration_key)) :
  $agent_full_info = wp_remote_get(sprintf('%s/crm/agents/info/%s', FLEX_IDX_BASE_URL, $agent_registration_key), ['timeout' => 10]);
  $agent_full_info = (is_wp_error($agent_full_info)) ? [] : wp_remote_retrieve_body($agent_full_info);

  if (!empty($agent_full_info)) {
    $agent_full_info = json_decode($agent_full_info, true);
  }

  // echo '<!-- debug: ';
  // print_r($agent_full_info);
  // echo '-->';

  $logo_type = $agent_full_info['info']['agent_logo_type'];
  $logo_title = $agent_full_info['info']['agent_logo_title'];
  $logo_slogan = $agent_full_info['info']['agent_logo_slogan'];
  $logo_img = $agent_full_info['info']['agent_logo_image'];

  $banner_type = $agent_full_info['info']['agent_home_page_banner_type'];
  $banner_title = $agent_full_info['info']['agent_home_page_banner_title'];
  $banner_sub_title = $agent_full_info['info']['agent_home_page_banner_sub_title'];
  $banner_vide = $agent_full_info['info']['agent_home_page_banner_path_video'];
  $banner_gallery = $agent_full_info['info']['agent_home_page_banner_gallery'];

?>
  <script>
    var IB_AGENT_REGISTRATION_KEY = "<?php echo $agent_registration_key; ?>";
    var IB_IS_AGENT_HOME = true;
  </script>
<?php endif; ?>

<!--<div class="wrap-preloader">
  <div class="item-wrap-preloader">
    <?php idx_the_custom_logo_header(); ?>
    <span class="preloader-icon"></span>
  </div>
</div>-->

<main id="agent">
  <section id="welcome" class="ms-section ms-animate">
    <?php if (!empty($banner_title)) {
      echo '<h1 class="ms-title">' . $banner_title . '</h1>';
    } else {
      echo '<h1 class="ms-title">Welcome to ' . $agent_full_info['info']['first_name'] . ' website</h1>';
    } ?>

    <?php if (!empty($banner_sub_title)) {
      echo '<h2 class="ms-subtitle">' . $banner_sub_title . '</h2>';
    } else {
      echo '<h2 class="ms-subtitle">Expert Real Estate Specialist</h2>';
    } ?>

    <div class="ms-wrap-btn">
      <a href="#" class="ms-btn js-btn-sell-rent active" title="buy"><span>buy</span></a>
      <a href="#" class="ms-btn js-btn-sell-rent" title="rent"><span>rent</span></a>
    </div>
    <?php echo do_shortcode('[flex_autocomplete registration_key="' . $agent_registration_key . '" agent_page_slug="' . $agent_page_slug . '"]'); ?>

    <?php if (!empty($banner_type) && $banner_type == '1' && !empty($banner_gallery) && is_array($banner_gallery) && count($banner_gallery) > 0): ?>
      <div class="ms-slider">
      <div class="gs-container-slider clidxboost-main-slider" data-gs='{"nav": true, "autoplay": true, "autoPlaySpeed": 4000}'>
      <?php foreach ($banner_gallery as $value):  ?>
            <img class="ms-img ms-lazy" data-real-type="image" data-img="<?php echo $value['url']; ?>" alt="<?php echo $value['altag']; ?>" title="<?php echo $value['title']; ?>">
      <?php endforeach; ?>
      </div>
    </div>
    <?php else: ?>
    <?php if (empty($banner_vide)): ?>
    <div class="ms-slider">
      <div class="gs-container-slider clidxboost-main-slider" data-gs='{"nav": true, "autoplay": true, "autoPlaySpeed": 4000}'>
        <img class="ms-img ms-lazy" data-real-type="image" data-img="https://www.relatedisgrealty.com/wp-content/uploads/2020/04/slide1.png">
          <img class="ms-img ms-lazy" data-real-type="image" data-img="https://www.relatedisgrealty.com/wp-content/uploads/2020/04/slide2.png">
          <img class="ms-img ms-lazy" data-real-type="image" data-img="https://www.relatedisgrealty.com/wp-content/uploads/2020/04/slide3.png">
      </div>
    </div>
    <?php else: ?>
    <div class="ms-wrp-video">
      <div class="ms-video-foreground" data-real-type="agentVideo" data-img="<?php echo $banner_vide; ?>"></div>
    </div>
    <?php endif; ?>
    <?php endif; ?>

    <button class="ms-next-step" data-step="#featured-properties" aria-label="Skip to main content">
      <div class="chevron"></div>
      <div class="chevron"></div>
      <div class="chevron"></div>
    </button>
  </section>
  <?php if (empty($agent_full_info['info']["agent_id"]) && empty($agent_full_info['info']["office_id"])): ?>
  <!-- no exclusive listings, temporary div TODO: benjamin -->
  <div style="height:100px;"></div>
  <?php else: ?>
    <section id="listings" class="ms-section ms-animate">
    <h2 class="ms-title">Featured Properties</h2>
    <div class="ms-wrap-slider">
      <?php
      // $filter_featured_page_token = flex_filter_has_featured_page();
      // if (null !== $filter_featured_page_token) {
      //   echo do_shortcode(sprintf('[flex_idx_filter id="%s" agent_slug="' . $post->post_name . '" type="2" " mode="thumbs" registration_key="' . $agent_registration_key . '"]', $filter_featured_page_token));
      // }
      echo do_shortcode('[flex_idx_filter agent_slug="' . $post->post_name . '" type="2" " mode="thumbs" registration_key="' . $agent_registration_key . '"]');
      ?>
    </div>
    <div class="ms-wrap-btn">
      <a href="<?php echo rtrim(get_permalink($post->ID), "/"); ?>/listings" class="ms-btn" title="View all Listings">
        <span>view all listings</span>
      </a>
    </div>
  </section>
  <?php endif; ?>

  <section id="profile" class="ms-animate">
    <article class="ms-section">
      <h2 class="ms-title"><?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?></h2>
      <h3 class="ms-sb-title"><?php echo $agent_full_info['info']['agent_title']; ?></h3>
      <ul class="ms-contact">
        <?php if (!empty($agent_full_info['info']['office_info'])): ?>
        <li>Office: <a href="tel:<?php echo preg_replace('/[^\d]/', '', $agent_full_info['info']['office_info']['phone']); ?>"><?php echo flex_agent_format_phone_number($agent_full_info['info']['office_info']['phone']); ?></a></li>
        <?php endif; ?>
        <?php if (!empty($agent_full_info['info']['contact_phone'])): ?>
        <li>Cell: <a href="tel:<?php echo preg_replace('/[^\d]/', '', $agent_full_info['info']['contact_phone']); ?>"><?php echo flex_agent_format_phone_number($agent_full_info['info']['contact_phone']); ?></a></li>
        <?php endif; ?>
        <?php if (!empty($agent_full_info['info']['contact_email'])): ?>
        <li>Email: <a href="mailto:<?php echo $agent_full_info['info']['contact_email']; ?>"><?php echo $agent_full_info['info']['contact_email']; ?></a></li>
        <?php endif; ?>
      </ul>
      <div class="ms-paragraph">
        <?php echo $agent_full_info['info']['bio']; ?>
      </div>
      <a class="ms-btn" href="<?php echo $agent_full_slugname; ?>/about" aria-label="Learn more">
        <span>Learn more</span>
      </a>
      <div class="ms-wrap-img">
        <img data-real-type="image" data-img="<?php echo $agent_full_info['info']['agent_photo_file']; ?>" src="<?php echo $agent_full_info['info']['agent_photo_file']; ?>" alt="<?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?> - <?php echo $agent_full_info['info']['agent_title']; ?>">
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
      <?php echo do_shortcode('[flex_idx_contact_form registration_key=' . $agent_registration_key . ']'); ?>
      <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="">
      <script type="text/javascript">
        jQuery(".flex-content-form .pt-name .medium").attr('placeholder', 'First Name*');
        jQuery(".flex-content-form .pt-lname .medium").attr('placeholder', 'Last Name*');
        jQuery(".flex-content-form .pt-email .medium").attr('placeholder', 'E-mail Address*');
        jQuery(".flex-content-form .pt-phone .medium").attr('placeholder', 'Phone Number');
        jQuery(".flex-content-form .textarea").attr('placeholder', 'Type your message here');
      </script>
    </div>
  </section>
</main>
<?php get_footer('idx-agents'); ?>

<script>
  var maxCharacters = 500;
  var profileTextWrapper = jQuery("#profile .ms-paragraph");
  var profileText = jQuery("#profile .ms-paragraph").text().trim().replace(/(\r\n|\n|\r)/gm, "&nbsp;");
  var newProfileText = profileText.slice(0, maxCharacters);
  profileTextWrapper.html('<p>' + newProfileText + '...</p>');
</script>