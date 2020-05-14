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
  </head>
  <?php $listclass = "";$bodyclasses = get_body_class();foreach ($bodyclasses as $class){$listclass = $listclass." ".$class;}?>

  <body class="<?php echo $listclass; ?> ib-wrap-full-width">
    <!-- GTM scripts inside body -->
    <?php do_action('idx_gtm_body'); ?>

    <header id="header" class="ms-header ms-bottom-shadow">
      <div class="ms-wrap-header">
        <div class="ms-top-header">


          <div class="ms-item ms-wp-login">

            <a href="tel:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>" class="ms-btn-phone">
              <?php echo __('CALL US', IDXBOOST_DOMAIN_THEME_LANG); ?> <?php echo $idx_contact_phone; ?>
            </a>

            <div class="ms-login-access">
              <?php if (false === $flex_idx_lead): ?>
              <ul class="item-no-hea item-header" id="user-options">
                <li class="login" data-modal="modal_login" data-tab="tabLogin">
                  <a href="javascript:void(0)" class="lg-login ms-btn-login" rel="nofollow" title="<?php echo __('Login', IDXBOOST_DOMAIN_THEME_LANG); ?>">
                    <span class="ms-icon-login"></span>
                    <span class="ms-text"><?php echo __('Login', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
                  </a>
                </li>
                <li class="register" data-modal="modal_login" data-tab="tabRegister">
                  <a href="javascript:void(0)" class="lg-register ms-btn-login ms-register" rel="nofollow" title="<?php echo __('Register', IDXBOOST_DOMAIN_THEME_LANG); ?>">
                    <span class="ms-text"><?php echo __('Register', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
                  </a>
                </li>
              </ul>
              <?php else: $my_flex_pages = flex_user_list_pages(); ?>
              <ul class="item-lo-hea item-header" id="user-options">
                <?php $lead_name_exp = explode(' ', esc_attr($flex_idx_lead['lead_info']['first_name']));?>
                <li class="login show_modal_login_active">
                  <a href="javascript:void(0)" rel="nofollow" title="<?php echo $lead_name_exp[0]; ?>"><?php echo $lead_name_exp[0]; ?></a>
                  <div class="menu_login_active disable_login">
                  <?php if (!empty($my_flex_pages)): ?>
                  <ul>
                    <?php foreach ($my_flex_pages as $my_flex_page): ?>
                    <li><a href="<?php echo $my_flex_page['permalink']; ?>" title="<?php echo $my_flex_page['post_title']; ?>"><?php echo $my_flex_page['post_title']; ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="#" class="flex-logout-link" id="flex-logout-link" title="<?php echo __('Logout', IDXBOOST_DOMAIN_THEME_LANG); ?>"><?php echo __('Logout', IDXBOOST_DOMAIN_THEME_LANG); ?></a></li>
                  </ul>
                  <?php endif; ?>
                  </div>
                </li>
              </ul>
              <?php endif; ?>
            </div>

            <a href="/search/" class="ms-link">Search</a>

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
                  <a class="btn-action js-btn-signup" href="#">Sign Up</a>
                  <a class="btn-action" href="#">Login</a>
                </li>
                <li>
                  <a class="btn-action btn-action-alt" href="tel:<?php echo preg_replace('/[^\d+]/', '', $flex_idx_info['agent']['agent_contact_phone_number']); ?>"><?php echo __('CALL US', IDXBOOST_DOMAIN_THEME_LANG); ?></a>
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
    </header>
