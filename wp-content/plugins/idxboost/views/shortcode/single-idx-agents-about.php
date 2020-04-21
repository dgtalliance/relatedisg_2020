<?php
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
    <?php /*
    <div class="gwr gwr-breadcrumb">
      <nav class="flex-breadcrumb" aria-label="breadcrumb">
        <ol>
          <li><a href="<?php echo get_permalink(get_the_ID()); ?>" title="Home">Home</a></li>
          <li aria-current="page"><?php echo get_the_title(); ?></li>
        </ol>
      </nav>
    </div> */ ?>

    <div class="gwr c-flex intro-about">
      <article class="flex-block-description">
        <div class="flex-blog-header">
          <h1 class="title-block"><?php echo get_the_title(); ?></h1>
        </div>

        <?php echo $agent_full_info['info']['bio']; ?>
      </article>
      <img src="<?php echo $agent_full_info['info']['agent_photo_file']; ?>" alt="<?php echo $agent_full_info['info']['first_name']; ?> <?php echo $agent_full_info['info']['last_name']; ?> - <?php echo $agent_full_info['info']['agent_title']; ?>">
    </div>
  </main>

<?php endwhile;
get_footer('idx-agents'); ?>