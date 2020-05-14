<?php
global $flex_idx_info, $flex_idx_lead, $wp, $post;
$custom_fields = get_post_custom(get_the_id());
$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
$idx_contact_phone = isset($flex_idx_info['agent']['agent_contact_phone_number']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_phone_number']) : '';
$idx_contact_email = isset($flex_idx_info['agent']['agent_contact_email_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_email_address']) : '';

$wp_request = $wp->request;
//$agent_registration_key = get_post_meta($post->ID, "_flex_agent_registration_key", true);
$agent_full_info = [];

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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php do_action('idx_gtm_head'); ?>
  <title><?php wp_title('|', 1, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="keywords" content="<?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_focuskw_text_input', true); ?>" />
  <?php $yoastdesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
  if (!$yoastdesc) { ?>
    <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php } ?>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <!-- APP HEADER COLOR -->
  <meta name="apple-mobile-web-app-status-bar-style" content="">
  <meta name="theme-color" content="">
  <meta name="msapplication-navbutton-color" content="">
  <?php wp_head(); ?>
</head>
<?php $listclass = "";
$bodyclasses = get_body_class();
foreach ($bodyclasses as $class) {
  $listclass = $listclass . " " . $class;
} ?>

<body class="<?php echo $listclass; ?> ib-wrap-full-width">
  <!-- GTM scripts inside body -->
  <?php do_action('idx_gtm_body'); ?>
  <header id="header" class="ms-header ms-bottom-shadow">
    <div class="ms-wrap-header">
      <div class="ms-top-header">


        <!-- INICIO LOGIN Y REGISTER -->
        <div class="ms-item ms-wp-login">
          <div class="ms-login-access">
            <?php if (false === $flex_idx_lead) : ?>
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
            <?php else : $my_flex_pages = flex_user_list_pages(); ?>
              <ul class="item-lo-hea item-header" id="user-options">
                <?php $lead_name_exp = explode(' ', esc_attr($flex_idx_lead['lead_info']['first_name'])); ?>
                <li class="login show_modal_login_active">
                  <a href="javascript:void(0)" rel="nofollow" title="<?php echo $lead_name_exp[0]; ?>"><?php echo $lead_name_exp[0]; ?></a>
                  <div class="menu_login_active disable_login">
                    <?php if (!empty($my_flex_pages)) : ?>
                      <ul>
                        <?php foreach ($my_flex_pages as $my_flex_page) : ?>
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
        </div>
        <!-- FINAL LOGIN Y REGISTER -->

        <!-- INICIO CONTACTO -->
        <div class="ms-item ms-wp-contact">
          <div class="ms-contact-info">
            <a href="tel:<?php echo preg_replace('/[^\d+]/', '', $agent_full_info['info']['contact_phone']); ?>" class="ms-btn-phone" title="<?php echo __('Call us ', IDXBOOST_DOMAIN_THEME_LANG); ?> <?php echo flex_agent_format_phone_number($agent_full_info['info']['contact_phone']); ?>">
              <span><span><?php echo __('Call', IDXBOOST_DOMAIN_THEME_LANG); ?> </span><?php echo flex_agent_format_phone_number($agent_full_info['info']['contact_phone']); ?></span>
            </a>
            <a href="mailto:<?php echo $agent_full_info['info']['contact_email']; ?>" class="ms-btn-email" title="<?php echo __('Email contact', IDXBOOST_DOMAIN_THEME_LANG); ?>">
              <span><?php echo __('Email', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
            </a>
            <a href="<?php echo $agent_full_slugname; ?>/search" class="ms-btn-search" title="<?php echo __('Search a Property', IDXBOOST_DOMAIN_THEME_LANG); ?>">
              <span><?php echo __('Search', IDXBOOST_DOMAIN_THEME_LANG); ?></span>
            </a>
          </div>
        </div>
        <!-- FINAL CONTACTO -->
      </div>

      <div class="ms-middle-header">
        <!-- INICIO LOGO -->
        <?php //idx_the_custom_logo_header_boots(); 
        ?>
        <a href="<?php echo $agent_full_slugname; ?>" class="idx_image_logo logo-content" rel="home" itemprop="url">
          <?php if ($logo_type == '1') { ?>
            <span class="logo-content-agent">
              <span class="logo-content-agent-name"><?php if (!empty($logo_title)) {
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
            <img class="idx_image_logo_agent ms-lg-agen" alt="<?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?> - <?php echo $agent_full_info['info']['agent_title']; ?>" src="<?php echo $logo_img; ?>">
          <?php } ?>
          <img class="idx_image_logo_agent" alt="<?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?> - <?php echo $agent_full_info['info']['agent_title']; ?>" src="<?php echo get_template_directory_uri(); ?>/images/logo_white.png">
        </a>
        <!-- FINAL LOGO -->

        <div class="ms-item">
          <!-- INICIO MENU -->
          <div class="wrap-menu">
            <nav id="menu-main" class="menu-main-menu-container">
              <ul id="menu-main-menu" class="">
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>">Home</a></li>

                <?php if (empty($agent_full_info["agent_id"]) && empty($agent_full_info["office_id"])): ?>
                <?php else: ?>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/listings">Featured Listings</a></li>
                <?php endif; ?>

                <?php if (empty($agent_full_info["soldagent_id"]) && empty($agent_full_info["soldoffice_id"])): ?>
                <?php else: ?>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/sold-listings">Recently Sold</a></li>
                <?php endif; ?>

                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/about">About</a></li>
                <li class="menu-item menu-item-has-children menu-item-type-post_type menu-item-object-page">
                  <a href="#">Services</a>
                  <ul class="sub-menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-sell">I Want to Sell</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-rent">I Want to Rent</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-buy">I Want to Buy</a></li>
                  </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/contact">Contact</a></li>
              </ul>
            </nav>
            <?php // wp_nav_menu(array('theme_location' => 'primary','menu' => 'Primary Menu', 'menu_class' => '', 'menu_id' => '', 'container' => 'nav', 'container_class' => '', 'container_id' => 'menu-main')); 
            ?>
          </div>
          <!-- FINAL MENU -->

          <!-- INICIO BOTON MENU -->
          <button class="ms-btn-menu" id="show-mobile-menu" aria-expanded="false" aria-label="<?php echo __('Show menu', IDXBOOST_DOMAIN_THEME_LANG); ?>">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <!-- FINAL BOTON MENU -->

          <!-- INICIO BOTON SEARCH -->
          <a class="ms-btn-search idx-agent" href="<?php echo $agent_full_slugname; ?>/search" aria-label="<?php echo __('Search a Property', IDXBOOST_DOMAIN_THEME_LANG); ?>">
            <span></span>
            <?php echo __('Search a Property', IDXBOOST_DOMAIN_THEME_LANG); ?>
          </a>
          <!-- FINAL BOTON SEARCH -->
          <?php //echo do_shortcode('[idxboost_lead_activities]'); 
          ?>
        </div>
      </div>
    </div>

    <!-- INICIO MENU RESPOSNIVE -->
    <div class="wrap-menu">
      <div class="ms-menu-responsive">
        <img class="wrap-menu-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Realted">

        <nav>
          <div class="mobile_menu_div_100">
            <ul id="menu-main-resposnive" class="menu-more-options">
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>">Home</a></li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/listings">Featured Listings</a></li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/sold-listings">Recently Sold</a></li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/about">About</a></li>
              <li class="menu-item menu-item-has-children menu-item-type-post_type menu-item-object-page">
                <a href="#">Services</a>
                <ul class="sub-menu">
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-sell">I Want to Sell</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-rent">I Want to Rent</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $agent_full_slugname; ?>/i-want-to-buy">I Want to Buy</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $agent_full_slugname; ?>/contact">Contact</a></li>
            </ul>
          </div>

          <div class="ms-menu-responsive-bottom">
            <ul class="actions">
              <li>
                <a class="btn-action" href="#">Sign Up</a>
                <a class="btn-action" href="#">Login</a>
              </li>
              <li>
                <a class="btn-action btn-action-alt" href="tel:<?php echo preg_replace('/[^\d+]/', '', $agent_full_info['info']['contact_phone']); ?>"><?php echo __('CALL US', IDXBOOST_DOMAIN_THEME_LANG); ?></a>
              </li>
            </ul>
            <ul class="social">
              <li>
                <a href="#" class="ms-link idx-icon-facebook" title="Navigate to Facebook" target="_blank" rel="nofollow"><span>Navigate to Facebook</span></a>
              </li>
              <li>
                <a href="#" class="ms-link idx-icon-instagram" title="Navigate to Instagram" target="_blank" rel="nofollow"><span>Navigate to Instagram</span></a>
              </li>
              <li>
                <a href="#" class="ms-link idx-icon-linkedin2" title="Navigate to Linked In" target="_blank" rel="nofollow"><span>Navigate to Linked In</span></a>
              </li>
            </ul>
          </div>
        </nav>
        <?php /*
          <nav>
            <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu' => 'Primary Menu',
            'menu_class' => 'menu-more-options',
            'menu_id' => 'menu-main-resposnive',
            'container_class' => 'mobile_menu_div_100'
            ));?>
          </nav> */ ?>
      </div>
    </div>
    <!-- FINAL MENU RESPONSIVE -->

    <div class="ms-overlay r-overlay"></div>
  </header>