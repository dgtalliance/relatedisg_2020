<?php
// single-idx-agents-notifications.php
get_header('idx-agents');
global $post, $flex_idx_info, $wpdb;
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

<?php while (have_posts()) : the_post(); ?>

<?php
$access_token = flex_idx_get_access_token();
$sendParams = array('access_token'     => $access_token, 'alert_token' => $_GET['token']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, FLEX_IDX_API_TRACK_PROPERTY_LOOK_TOKEN);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($sendParams));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
$server_output = curl_exec($ch);

$dataTokentem = json_decode($server_output, true);
curl_close($ch);
$datanotifi = explode(',', $dataTokentem[0]['alert_notification_types']);
/*OBTENCION_DATA_TOKEN*/
wp_enqueue_script('flex-idx-alerts-js');

if (is_array($_COOKIE)) {
  if (array_key_exists('ib_lead_token', $_COOKIE) == false) {
    if (is_array($dataTokentem)) {
      if (array_key_exists('encode_token', $dataTokentem)) {
        if (!empty($dataTokentem['encode_token'])) {
          $encode_token = $dataTokentem['encode_token'];
          echo '<script type="text/javascript"> Cookies.set("ib_lead_token","' . $encode_token . '"); location.reload(); </script>';
        }
      }
    }
  }
}

$unsubscribe=false;
if ( !empty($_GET)  ) {
  if( array_key_exists('action',$_GET) && $_GET['action'] == 'unsubscribe' ) {
    $unsubscribe=true;
  }
}

if ($unsubscribe) {
    $save_alert_params = ['wp_web_id' => get_option('flex_idx_alerts_app_id'), 'rk' => get_option('flex_idx_alerts_keys'), 'wp_user_id' => $_GET['token']];
    $update_alert_q    = flex_http_request(FLEX_IDX_ALERTS_UNREGISTER, $save_alert_params);
    $response['alert'] = $update_alert_q;

    $save_alert_params_cpanel = array('access_token'     => $access_token, 'alert_token' => $_GET['token']);
    $update_alert_q_cpanel    = flex_http_request(FLEX_IDX_API_TRACK_UNSUBSCRIBE_LEAD_ALERT, $save_alert_params_cpanel);

  ?>
    <!-- UPDATE SEARCH MODAL -->
    <div class="idxboost_subscribe">

      <div class="idx_body_alert_unsubscribe">
        <div class="idxboost_tile">
          <h2><?php echo __('UNSUBSCRIBE ALERT', IDXBOOST_DOMAIN_THEME_LANG); ?></h2>
        </div>
        <div class="idxboost_description">
          <p><?php echo __('You’ve been unsubscribed from My Saved Search.', IDXBOOST_DOMAIN_THEME_LANG); ?></p>
          <p><?php echo __('You’ll still receive other ', IDXBOOST_DOMAIN_THEME_LANG); ?><?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?> <?php echo __('emails that you have subscribed to.', IDXBOOST_DOMAIN_THEME_LANG); ?></p>
        </div>
      </div>

      <div class="idxboost_description_footer">
        <form id="form-update-alert-for-token" method="POST">
          <div class="gform_body">
            <ul class="list-check" style="display:none;">
              <li><input <?php if (in_array('new_listing', $datanotifi)) echo "checked"; ?> class="flex-save-type-options" id="update-listing-alert" name="notification_type_update_token[]" type="checkbox" value="new_listing" /><label for="update-listing-alert"><?php echo __('New Listing (Always)', IDXBOOST_DOMAIN_THEME_LANG); ?></label>
              </li>
              <li><input <?php if (in_array('price_changes', $datanotifi)) echo "checked"; ?> class="flex-save-type-options" id="update-price-change-alert" name="notification_type_update_token[]" type="checkbox" value="price_changes"><label for="update-price-change-alert"><?php echo __('Price Changes', IDXBOOST_DOMAIN_THEME_LANG); ?></label>
              </li>
              <li><input <?php if (in_array('status_changes', $datanotifi))  echo "checked"; ?> class="flex-save-type-options" id="update-status-change-alert" name="notification_type_update_token[]" type="checkbox" value="status_changes" /><label for="update-status-change-alert"><?php echo __('status changes', IDXBOOST_DOMAIN_THEME_LANG); ?></label>
              </li>
            </ul>
          </div>
          <input class="medium" id="input_update_name_search_token" name="input_sname" type="hidden" value="<?php echo $dataTokentem[0]['name']; ?>">
          <input type="hidden" name="token_alert_status" class="iboost-alert-change-interval notification_day_update_flo" value="1">
          <input type="hidden" name="token_alert_flo" class="token_alert_flo" value="<?php echo $_GET['token']; ?>">
          <input type="hidden" name="type_alert" class="type_alert" value="delete">
          <div class="idxboost_footer_resbuscribe idx_body_alert_unsubscribe">
            <p><?php echo __('Oops, was it a mistake? ', IDXBOOST_DOMAIN_THEME_LANG); ?>
              <div class="form_submit_button_search_desuscribe gform_button button gform_submit_button_5"><?php echo __('Resubscribe', IDXBOOST_DOMAIN_THEME_LANG); ?></div>
          </div>
          <div class="idxboost_footer_thank" style="display: none;">
            <p><?php echo __('Hooray! You have resubscribed.', IDXBOOST_DOMAIN_THEME_LANG); ?></p>
            <p><?php echo __('Thanks for staying with us.', IDXBOOST_DOMAIN_THEME_LANG); ?></p>
          </div>
        </form>
      </div>
    </div>
    <!-- ALERTS -->
    <div class="overlay_modal" id="modal_subscribe">
      <div class="modal_cm">
        <button data-id="modal_subscribe" class="close close-modal" data-frame="modal_mobile"><?php echo __('Close', IDXBOOST_DOMAIN_THEME_LANG); ?> <span></span></button>
        <div class="content_md">
          <div class="body_md">
            <div class="confirm-message alt-ss">
              <h3 class="alt-ss-title"><?php echo __('SUBSCRIBE ALERT', IDXBOOST_DOMAIN_THEME_LANG); ?></h3>
              <p><?php echo __('Hooray! You have resubscribied. Thanks for staying with us.', IDXBOOST_DOMAIN_THEME_LANG); ?></p>
              <a href="<?php echo $agent_full_info['info']['agent_url'].'/search'; ?>" class="btn-link"><?php echo __('Continue searching for homes', IDXBOOST_DOMAIN_THEME_LANG); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="overlay_modal_closer" data-id="modal_subscribe" data-frame="modal_mobile"></div>
    </div>
  <?php } ?>


<?php endwhile;
get_footer('idx-agents'); ?>