<?php
get_header('idx-agents');

global $post;

$agent_registration_key = get_post_meta($post->ID, "_flex_agent_registration_key", true);

$agent_full_info = wp_remote_get(sprintf('%s/crm/agents/info/%s', FLEX_IDX_BASE_URL, $agent_registration_key), ['timeout' => 10]);
$agent_full_info = (is_wp_error($agent_full_info)) ? [] : wp_remote_retrieve_body($agent_full_info);

if (!empty($agent_full_info)) {
  $agent_full_info = json_decode($agent_full_info, true);
  $rel_agent_photo_src = $agent_full_info['info']['agent_avatar_image'];
  $rel_agent_full_name = sprintf('%s %s', $agent_full_info['info']['first_name'], $agent_full_info['info']['last_name']);
  $rel_agent_phone_number = flex_agent_format_phone_number($agent_full_info['info']['contact_phone']);
} else {
  $rel_agent_photo_src = null;
  $rel_agent_full_name = null;
  $rel_agent_phone_number = null;
}
?>
<?php if (isset($agent_registration_key) && !empty($agent_registration_key)) : ?>
  <script>
    var IB_AGENT_REGISTRATION_KEY = "<?php echo $agent_registration_key; ?>";
    // var IB_AGENT_PROPERTY_SLUG = "<?php get_permalink($post->ID); ?>/property/";
    var IB_AGENT_PROPERTY_SLUG = "<?php echo sprintf('%s/%s', rtrim(get_permalink($post->ID), '/'), 'property'); ?>";
    <?php if (isset($rel_agent_photo_src) && !empty($rel_agent_photo_src)) : ?>
      var IB_AGENT_PHOTO_SRC = "<?php echo $rel_agent_photo_src; ?>";
    <?php endif; ?>
    <?php if (isset($rel_agent_full_name) && !empty($rel_agent_full_name)) : ?>
      var IB_AGENT_FULL_NAME = "<?php echo $rel_agent_full_name; ?>";
    <?php endif; ?>
    <?php if (isset($rel_agent_phone_number) && !empty($rel_agent_phone_number)) : ?>
      var IB_AGENT_PHONE_NUMBER = "<?php echo $rel_agent_phone_number; ?>";
    <?php endif; ?>
  </script>
<?php endif; ?>

<?php
while (have_posts()) :
  the_post();
?>

<?php
  echo do_shortcode('[ib_search registration_key="' . $agent_registration_key . '"]');
//the_content();
endwhile;
get_footer();
?>