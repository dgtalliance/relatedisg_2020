<?php
// single-idx-agents-notifications.php
get_header('idx-agents');
global $post, $flex_idx_info;
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

  <main id="flex-about-theme">
    <div class="gwr c-flex intro-about">
        <h1>Notifications</h1>
    </div>
  </main>

<?php endwhile;
get_footer('idx-agents'); ?>