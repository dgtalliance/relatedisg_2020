<?php
global $flex_idx_info, $dgtForms, $post;
$idx_contact_email = isset($flex_idx_info['agent']['agent_contact_email_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_email_address']) : '';
$idx_contact_phone = isset($flex_idx_info['agent']['agent_contact_phone_number']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_phone_number']) : '';

if (isset($_GET['ib_ref'])) {
  $agent_registration_key = isset($_GET['ibref']) ? preg_replace('/[^a-z\-0-9]+/', '', $_GET['ibref']) : null;
} else {
  $agent_registration_key = get_post_meta($post->ID, '_flex_agent_registration_key', true);
}

if ("idx-agents" === $post->post_type) {
  $explode_idx_agent = explode("/", $wp->request);

  if (1 === count($explode_idx_agent)) {
    list($agent_name) = explode("/", $wp->request);
  } else {
    list($agent_name, $agent_pagename) = explode("/", $wp->request);
  }
  $agent_full_slugname = implode("/", [site_url(), $agent_name]);
}

$agent_full_info = wp_remote_get(sprintf('%s/crm/agents/info/%s', FLEX_IDX_BASE_URL, $agent_registration_key), ['timeout' => 10]);
$agent_full_info = (is_wp_error($agent_full_info)) ? [] : wp_remote_retrieve_body($agent_full_info);

if (!empty($agent_full_info)) {
  $agent_full_info = json_decode($agent_full_info, true);
}

$logo_type = $agent_full_info['info']['agent_logo_type'];
$logo_title = $agent_full_info['info']['agent_logo_title'];
$logo_slogan = $agent_full_info['info']['agent_logo_slogan'];
$logo_img = $agent_full_info['info']['agent_logo_image'];

$facebook_social_url = $agent_full_info['info']['facebook_social_url'];
$twitter_social_url = $agent_full_info['info']['twitter_social_url'];
$gplus_social_url = $agent_full_info['info']['gplus_social_url'];
$youtube_social_url = $agent_full_info['info']['youtube_social_url'];
$instagram_social_url = $agent_full_info['info']['instagram_social_url'];
$linkedin_social_url = $agent_full_info['info']['linkedin_social_url'];

?>
<?php if (get_post_type() !== 'flex-idx-pages') { ?>
  <footer id="footer" class="ms-footer-agent ms-section ms-animate" role="contentinfo">
    <div class="ms-wrap-footer">
      <div class="ms-info-footer">
        <a href="<?php echo $agent_full_slugname; ?>" class="ms-logo-footer">
          <?php if ($logo_type == '1') { ?>
            <span class="logo-content-agent">
              <span class="logo-content-agent-name">
                <?php if (!empty($logo_title)) {
                echo $logo_title;
                } else {
                echo $agent_full_info['info']['first_name'] . ' ' . $agent_full_info['info']['last_name'];
                }  ?></span>
                <span class="logo-content-agent-title"><?php if (!empty($logo_slogan)) {
                echo $logo_slogan;
                } else {
                echo $agent_full_info['info']['agent_title'];
                }  ?></span>
            </span>
          <?php } ?>
          <?php if ($logo_type == '2') { ?>
            <img class="ms-lazy idx_image_logo_agent ms-lg-agen" data-real-type="image" data-img="<?php echo $logo_img; ?>" src="<?php echo $logo_img; ?>">

          <?php } ?>

          <img class="ms-lazy idx_image_logo_agent" alt="<?php echo __('Contact me', IDXBOOST_DOMAIN_THEME_LANG); ?>" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/logo_white.png" src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
        </a>
        <ul class="ms-wrap-gt">
          <li>
            <span><?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?></span> | <span>Agent Login</span> | <a href="#" target="_blank">Broker Dashboard</a>
          </li>
          <li>
            <span>Cell: <a class="ms-link" href="tel:<?php echo preg_replace('/[^\d+]/', '', $agent_full_info['info']['contact_phone']); ?>" title="<?php echo __('Call us ', IDXBOOST_DOMAIN_THEME_LANG); ?> <?php echo flex_agent_format_phone_number($agent_full_info['info']['contact_phone']); ?>"><?php echo flex_agent_format_phone_number($agent_full_info['info']['contact_phone']); ?></a></span> | <span><a class="ms-link" href="mailto:<?php echo $agent_full_info['info']['contact_email']; ?>" title="<?php echo __('Email', IDXBOOST_DOMAIN_THEME_LANG); ?>:<?php echo $agent_full_info['info']['contact_email']; ?>"><?php echo $agent_full_info['info']['contact_email']; ?></a></span>
          </li>
          <li>
            <address><?php echo $agent_full_info['info']['office_info']['address']; ?></address>
          </li>
        </ul>
        
        <div class="ms-wrap-mls">
          <?php if (
            !empty($facebook_social_url) || 
            !empty($twitter_social_url) || 
            !empty($youtube_social_url) || 
            !empty($instagram_social_url) || 
            !empty($linkedin_social_url) 
          ) { ?>

            <div class="ms-social">
              <?php if (!empty($facebook_social_url)) { ?>
                <a href="<?php echo $facebook_social_url; ?>" class="ms-link idx-icon-facebook" title="Navigate to Facebook" target="_blank" rel="nofollow"><span>Navigate to Facebook</span></a>
              <?php } ?>
              
              <?php if (!empty($twitter_social_url)) { ?>
                <a href="<?php echo $twitter_social_url; ?>" class="ms-link idx-icon-twitter" title="Navigate to Twitter" target="_blank" rel="nofollow"><span>Navigate to Twitter</span></a>
              <?php } ?>

              <?php if (!empty($youtube_social_url)) { ?>
                <a href="<?php echo $youtube_social_url; ?>" class="ms-link idx-icon-youtube-logo" title="Navigate to Youtube" target="_blank" rel="nofollow"><span>Navigate to Youtube</span></a>
              <?php } ?>

              <?php if (!empty($instagram_social_url)) { ?>
                <a href="<?php echo $instagram_social_url; ?>" class="ms-link idx-icon-instagram" title="Navigate to Instagram" target="_blank" rel="nofollow"><span>Navigate to Instagram</span></a>
              <?php } ?>

              <?php if (!empty($linkedin_social_url)) { ?>
                <a href="<?php echo $linkedin_social_url; ?>" class="ms-link idx-icon-linkedin2" title="Navigate to Linked In" target="_blank" rel="nofollow"><span>Navigate to Linked In</span></a>
              <?php } ?>
            </div>
            
          <?php } ?>

          <img class="ms-img" alt="The Real Estate Marketing Group" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/ms-mls.png" src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
        </div>
      </div>

      <div class="ms-footer-cpr">
        <p>Any information concerning development projects or real estate for sale is not intended to be an offer to sell, or a solicitation to Website visitors to buy, any real estate to residents of any jurisdiction where such an offer or solicitation is prohibited by law.</p>
      </div>

      <div class="ms-bottom-footer">
        <div class="ms-footer-section">
          <ul class="ms-sub-menu-footer">
            <li><a href="/terms-and-conditions/" title="Privacy" target="_blank">Privacy</a></li>
            <li><a href="/terms-and-conditions/#atospp-privacy" title="Terms of Service" target="_blank">Terms and Conditions</a></li>
            <li><a href="/accessibility/" title="Terms of Service" target="_blank">Accessibility</a></li>
          </ul>
          <p class="ms-copyright">© <?php echo date('Y'); ?> RELATEDISG. ALL RIGHTS RESERVED</p>
          <div class="ms-trem">
            DESIGN BY RELATEDISG MARKETING; DEVELOPED + POWERED BY <a href="http://www.tremgroup.com/" target="_blank" title="TREMGROUP"><span>TREM</span>GROUP</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php } ?>

<?php if (!empty(get_theme_mod('idx_languages_list'))) {
  if (empty(get_theme_mod('idx_languages_list')))  $idx_languages_list  = [];
  else  $idx_languages_list  = get_theme_mod('idx_languages_list');
  if (
    (array_key_exists('English', $idx_languages_list) && $idx_languages_list['English'] == "1") ||
    (array_key_exists('Russian', $idx_languages_list) && $idx_languages_list['Russian'] == "1") ||
    (array_key_exists('Spanish', $idx_languages_list) && $idx_languages_list['Spanish'] == "1") ||
    (array_key_exists('Portuguese', $idx_languages_list) && $idx_languages_list['Portuguese'] == "1") ||
    (array_key_exists('French', $idx_languages_list) && $idx_languages_list['French'] == "1") ||
    (array_key_exists('Italian', $idx_languages_list) && $idx_languages_list['Italian'] == "1") ||
    (array_key_exists('German', $idx_languages_list) && $idx_languages_list['German'] == "1") ||
    (array_key_exists('Chinese', $idx_languages_list) && $idx_languages_list['Chinese'] == "1")
  ) { ?>
    <div id="google_translate_element"></div>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateInit"></script>
    <script>
      function googleTranslateInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'en',
          includedLanguages: 'en,ru,es,pt,fr,it,de,zh-TW',
          multilanguagePage: true,
          autoDisplay: true,
          layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
      }
    </script>
<?php }
} ?>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/dgt/dgt-project-master.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/webfont.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/project.min.js"></script>
<script>
  jQuery(document).on('click', '#signUpSection .ms-btn', function(e) {
    jQuery("#user-options .register").trigger("click");
  });
</script>
</body>
</html>