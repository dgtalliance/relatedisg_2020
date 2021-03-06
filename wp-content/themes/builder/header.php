<?php
  global $flex_idx_info, $flex_idx_lead;
  $custom_fields = get_post_custom(get_the_id());
  $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
  $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
  $idx_contact_phone = isset($flex_idx_info['agent']['agent_contact_phone_number']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_phone_number']) : '';
  $idx_contact_email = isset($flex_idx_info['agent']['agent_contact_email_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_email_address']) : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php do_action('idx_gtm_head'); ?>
    <title><?php wp_title('|', 1, 'right');?> <?php bloginfo('name');?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="keywords" content="<?php echo get_post_meta(get_the_ID(),'_yoast_wpseo_focuskw_text_input', true); ?>" />  
    <?php $yoastdesc = get_post_meta(get_the_ID(),'_yoast_wpseo_metadesc', true); if(!$yoastdesc){?>
    <meta name="description" content="<?php bloginfo('description');?>">
    <?php } ?>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- APP HEADER COLOR -->
    <meta name="apple-mobile-web-app-status-bar-style" content="">
    <meta name="theme-color" content="">
    <meta name="msapplication-navbutton-color" content="">
    <?php wp_head();?>
      <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-88671886-1', 'auto');
          ga('send', 'pageview');
      </script>
  </head>
  <?php $listclass = "";$bodyclasses = get_body_class();foreach ($bodyclasses as $class){$listclass = $listclass." ".$class;}?>

  <body class="<?php echo $listclass; ?> ib-wrap-full-width using-mouse">
    <!-- GTM scripts inside body -->
    <?php do_action('idx_gtm_body'); ?>

    <header id="header" class="ms-header ms-bottom-shadow">
      <div class="ms-wrap-header">
        <div class="ms-top-header">
          <div class="ms-item ms-wp-login">
            <a href="tel:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>" 
            class="ms-btn-phone" 
            title="Contact phone:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>"><?php echo __('CALL US', IDXBOOST_DOMAIN_THEME_LANG); ?> <?php echo $idx_contact_phone; ?>
            </a>

            <div class="ms-login-access">
              <?php if (false === $flex_idx_lead): ?>
              <ul class="item-no-hea item-header" id="user-options">
                <li class="login" data-modal="modal_login" data-tab="tabLogin">
                  <button class="lg-login ms-btn-login" rel="nofollow" aria-label="<?php echo __('Login', IDXBOOST_DOMAIN_THEME_LANG); ?>" title="Login">
                    <span class="ms-icon-login"></span>
                    <span class="ms-text"><?php echo __('Login', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
                  </button>
                </li>
                <li class="register" data-modal="modal_login" data-tab="tabRegister">
                  <button class="lg-register ms-btn-login ms-register" rel="nofollow" aria-label="<?php echo __('Register', IDXBOOST_DOMAIN_THEME_LANG); ?>" title="register">
                    <span class="ms-text"><?php echo __('Register', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
                  </button>
                </li>
              </ul>
              <?php else: $my_flex_pages = flex_user_list_pages(); ?>
              <ul class="item-lo-hea item-header" id="user-options">
                <?php $lead_name_exp = explode(' ', esc_attr($flex_idx_lead['lead_info']['first_name']));?>
                <li class="login show_modal_login_active">
                  <button rel="nofollow" aria-label="Welcome <?php echo $lead_name_exp[0]; ?>" title="Welcome <?php echo $lead_name_exp[0]; ?>"><?php echo $lead_name_exp[0]; ?></button>
                  <div class="menu_login_active disable_login">
                  <?php if (!empty($my_flex_pages)): ?>
                  <ul>
                    <?php foreach ($my_flex_pages as $my_flex_page): ?>
                    <li><a href="<?php echo $my_flex_page['permalink']; ?>" title="Go to <?php echo $my_flex_page['post_title']; ?>"><?php echo $my_flex_page['post_title']; ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="#" class="flex-logout-link" id="flex-logout-link" title="<?php echo __('Logout', IDXBOOST_DOMAIN_THEME_LANG); ?>"><?php echo __('Logout', IDXBOOST_DOMAIN_THEME_LANG); ?></a></li>
                  </ul>
                  <?php endif; ?>
                  </div>
                </li>
              </ul>
              <?php endif; ?>
            </div>
            <a href="/search/" class="ms-link" title="<?php echo __('Search the best Property', IDXBOOST_DOMAIN_THEME_LANG); ?>">Search</a>
          </div>
        </div>

        <div class="ms-middle-header">
          <?php idx_the_custom_logo_header_boots(); ?>
          <div class="ms-item">
            <div class="wrap-menu">
              <?php wp_nav_menu(array('theme_location' => 'primary','menu' => 'Primary Menu', 'menu_class' => '', 'menu_id' => '', 'container' => 'nav', 'container_class' => '', 'container_id' => 'menu-main')); ?>
            </div>

            <button class="ms-btn-menu" id="show-mobile-menu" aria-expanded="false"
              aria-label="<?php echo __('Show menu', IDXBOOST_DOMAIN_THEME_LANG); ?>">
              Menu <span></span>
            </button>

            <a class="ms-btn-search pc" href="/search" title="<?php echo __('Search the best Property', IDXBOOST_DOMAIN_THEME_LANG); ?>">
              <span></span>
              <?php echo __('Search a Property', IDXBOOST_DOMAIN_THEME_LANG); ?>
            </a>
            <?php //echo do_shortcode('[idxboost_lead_activities]'); ?>
          </div>
        </div>
      </div>
      
      <div class="wrap-menu">
        <div class="ms-menu-responsive">
          <img class="wrap-menu-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Realted">
          <nav>
            <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu' => 'Primary Menu',
            'menu_class' => 'menu-more-options',
            'menu_id' => 'menu-main-resposnive',
            'container_class' => 'mobile_menu_div_100'
            ));?>

            <div class="ms-menu-responsive-bottom">
              <ul class="actions">
                <li>
                  <a href="javascript:void(0)" class="btn-action ms-lg-btn" title="Sign Up" data-login="login">Sign Up</a>
                  <a href="javascript:void(0)" class="btn-action ms-lg-btn" title="Register" data-login="register">Register</a>
                </li>
                <li>
                  <a class="btn-action btn-action-alt" href="tel:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>" title="Contact phone number:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>"><?php echo __('CALL US', IDXBOOST_DOMAIN_THEME_LANG); ?></a>
                </li>
              </ul>
              <ul class="social">
              <?php if (!empty($flex_idx_info["social"]["facebook_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["facebook_social_url"]; ?>"
                  class="ms-link idx-icon-facebook" title="Navigate to Facebook" target="_blank" 
                  rel="nofollow"><span>Facebook</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["twitter_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["twitter_social_url"]; ?>"
                  class="ms-link idx-icon-twitter" title="Navigate to Twitter" target="_blank"
                  rel="nofollow"><span>Twitter</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["gplus_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["gplus_social_url"]; ?>"
                  class="ms-link idx-icon-google-plus" title="Navigate to Google+" target="_blank"
                  rel="nofollow"><span>Google+</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["youtube_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["youtube_social_url"]; ?>"
                  class="ms-link idx-icon-youtube-logo" title="Navigate to Youtube" target="_blank"
                  rel="nofollow"><span>YouTube</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["instagram_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["instagram_social_url"]; ?>"
                  class="ms-link idx-icon-instagram" title="Navigate to Instagram" target="_blank"
                  rel="nofollow"><span>Instagram</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["linkedin_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["linkedin_social_url"]; ?>"
                  class="ms-link idx-icon-linkedin2" title="Navigate to Linked In" target="_blank"
                  rel="nofollow"><span>Linked In</span></a>
                </li>
              <?php endif; ?>
              <?php if (!empty($flex_idx_info["social"]["pinterest_social_url"])): ?>
                <li>
                  <a href="<?php echo $flex_idx_info["social"]["pinterest_social_url"]; ?>"
                  class="ms-link idx-icon-pinterest-p" title="Navigate to Pinterest" target="_blank"
                  rel="nofollow"><span>Pinterest</span></a>
                </li>
              <?php endif; ?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="ms-overlay r-overlay"></div>

      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '141946037331429');
        fbq('track', 'PageView');
        </script>
        <noscript>
        <img height="1" width="1"
        src="https://www.facebook.com/tr?id=141946037331429&ev=PageView
        &noscript=1"/>
      </noscript>
      <!-- End Facebook Pixel Code -->

    </header>