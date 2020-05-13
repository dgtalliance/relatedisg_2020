<?php
get_header('idx-agents');

global $flex_idx_info, $post;

$agent_registration_key = get_post_meta($post->ID, "_flex_agent_registration_key", true);
$agent_full_info = [];
?>

<?php if (isset($agent_registration_key) && !empty($agent_registration_key)) :
  $agent_full_info = wp_remote_get(sprintf('%s/crm/agents/info/%s', FLEX_IDX_BASE_URL, $agent_registration_key), ['timeout' => 10]);
  $agent_full_info = (is_wp_error($agent_full_info)) ? [] : wp_remote_retrieve_body($agent_full_info);

  if (!empty($agent_full_info)) {
    $agent_full_info = json_decode($agent_full_info, true);
  }
?>
  <script>
    var IB_AGENT_REGISTRATION_KEY = "<?php echo $agent_registration_key; ?>";
    //console.log(IB_AGENT_REGISTRATION_KEY);
  </script>
<?php endif; ?>

<?php
$flex_theme_options = get_option('theme_mods_flexidx');
$post_thumbnail_id = get_post_thumbnail_id(get_the_id());
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
$idx_contact_phone = isset($flex_idx_info['agent']['agent_contact_phone_number']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_phone_number']) : '';
$idx_contact_email = isset($flex_idx_info['agent']['agent_contact_email_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_email_address']) : '';
$idx_contact_address = isset($flex_idx_info['agent']['agent_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_address']) : '';
$idx_contact_address2 = isset($flex_idx_info['agent']['agent_address2']) ? sanitize_text_field($flex_idx_info['agent']['agent_address2']) : '';
$idx_contact_zip_code = isset($flex_idx_info['agent']['agent_zip_code']) ? sanitize_text_field($flex_idx_info['agent']['agent_zip_code']) : '';
$idx_contact_state = isset($flex_idx_info['agent']['agent_state']) ? sanitize_text_field($flex_idx_info['agent']['agent_state']) : '';
$idx_contact_city = isset($flex_idx_info['agent']['agent_city']) ? sanitize_text_field($flex_idx_info['agent']['agent_city']) : '';
$agent_first_name = isset($flex_idx_info['agent']['agent_first_name']) ? sanitize_text_field($flex_idx_info['agent']['agent_first_name']) : '';
$agent_last_name = isset($flex_idx_info['agent']['agent_last_name']) ? sanitize_text_field($flex_idx_info['agent']['agent_last_name']) : '';
$idx_contact_lat = isset($flex_idx_info['agent']['agent_address_lat']) ? sanitize_text_field($flex_idx_info['agent']['agent_address_lat']) : '';
$idx_contact_lng = isset($flex_idx_info['agent']['agent_address_lng']) ? sanitize_text_field($flex_idx_info['agent']['agent_address_lng']) : '';

// $idx_contact_address = $idx_contact_address.' '.$idx_contact_address2.', '.$idx_contact_city.', '.$idx_contact_state.' '.$idx_contact_zip_code;

if ((empty($idx_contact_lat)) && (empty($idx_contact_lng))) {
  $chlatlong = curl_init();
  curl_setopt($chlatlong, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($idx_contact_address) . '&key=' . $flex_idx_info["agent"]["google_maps_api_key"]);
  curl_setopt($chlatlong, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($chlatlong, CURLOPT_FAILONERROR, true);
  $outputlatlong = curl_exec($chlatlong);
  curl_close($chlatlong);

  $outtemporali = json_decode($outputlatlong, true);
  if ($outtemporali['status'] == 'OK') {
    foreach ($outtemporali['results'] as $keygeom => $valuegeome) {
      $idx_contact_lat = $valuegeome['geometry']['location']['lat'];
      $idx_contact_lng = $valuegeome['geometry']['location']['lng'];
    }
  }
}

if (!empty($agent_full_info)) {
  $idx_contact_phone = isset($agent_full_info['info']['contact_phone']) ? $agent_full_info['info']['contact_phone'] : null;
  $idx_contact_email = isset($agent_full_info['info']['contact_email']) ? $agent_full_info['info']['contact_email'] : null;
  $idx_contact_address = isset($agent_full_info['info']['address']) ? $agent_full_info['info']['address'] : null;
  $idx_contact_lat = null;
  $idx_contact_lng = null;

  if (!empty($idx_contact_address)) {
    $chlatlong = curl_init();
    curl_setopt($chlatlong, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($idx_contact_address) . '&key=' . $flex_idx_info["agent"]["google_maps_api_key"]);
    curl_setopt($chlatlong, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chlatlong, CURLOPT_FAILONERROR, true);
    $outputlatlong = curl_exec($chlatlong);
    curl_close($chlatlong);

    $outtemporali = json_decode($outputlatlong, true);
    if ($outtemporali['status'] == 'OK') {
      foreach ($outtemporali['results'] as $keygeom => $valuegeome) {
        $idx_contact_lat = $valuegeome['geometry']['location']['lat'];
        $idx_contact_lng = $valuegeome['geometry']['location']['lng'];
      }
    }
  }
}

while (have_posts()) : the_post(); ?>

  <main id="flex-contact-theme">
    <?php /*
    <!-- Breadcrumb -->
    <div class="gwr gwr-breadcrumb">
      <nav class="flex-breadcrumb" aria-label="breadcrumb">
        <ol>
          <li><a href="<?php echo get_permalink(get_the_ID()); ?>" title="Home">Home</a></li>
          <li aria-current="page">Contact Us</li>
        </ol>
      </nav>
    </div> */ ?>

    <!-- Wrap contact -->
    <div class="flex-wrap-contact">

      <!-- CONPANY -->
      <div class="flex-wrap-company">
        <div class="flex-wrap-company-information">
          <h2><?php the_title(); ?></h2>
          <?php if (!empty($idx_contact_phone) || !empty($idx_contact_email) || !empty($agent_full_info['info']['office_info'])): ?>
          <ul>
            <?php if (!empty($idx_contact_phone)): ?>
            <li>
              <a class="phone" href="tel:<?php echo preg_replace('/[^\d]/', '', $idx_contact_phone); ?>"><?php echo flex_agent_format_phone_number($idx_contact_phone); ?></a>
            </li>
            <?php endif; ?>
            <?php if (!empty($idx_contact_email)): ?>
            <li>
              <a class="email" href="mailto:<?php echo $idx_contact_email; ?>"><?php echo $idx_contact_email; ?></a>
            </li>
            <?php endif; ?>
            <?php if (!empty($agent_full_info['info']['office_info'])): ?>
            <li>
              <a href="javascript:void(0)" class="mapa"><?php echo $agent_full_info['info']['office_info']['address']; ?></a>
            </li>
            <?php endif; ?>
          </ul>
            <?php endif; ?>
        </div>
        <div id="flex-wrap-contact-map">
          <div id="map" data-lat="<?php echo $idx_contact_lat; ?>" data-lng="<?php echo $idx_contact_lng; ?>"></div>
        </div>
      </div>
      <!-- FORM CONTACT -->
      <div class="flex-wrap-contact-form">
        <?php echo do_shortcode('[flex_idx_contact_form registration_key="' . $agent_registration_key . '"]'); ?>
        <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="<?php echo $idx_contact_email; ?>">
      </div>
    </div>
  </main>

<?php endwhile; ?>
<?php get_footer('idx-agents'); ?>