<?php
get_header();
$post_id = get_the_ID();
//$filter_agent = get_post_meta($post_id, '_dgt_speciality_agent_idx', true);
//$filter_office = get_post_meta($post_id, '_dgt_speciality_office_idx', true);
$email = get_post_meta(get_the_ID(), '_dgt_speciality_email', true);
$title = get_post_meta(get_the_ID(), '_dgt_speciality_title', true);
$phone = get_post_meta(get_the_ID(), '_dgt_speciality_phone', true);
$phone_office = get_post_meta(get_the_ID(), '_dgt_speciality_phone_office', true);
$fb = get_post_meta(get_the_ID(), '_dgt_speciality_fb', true);
$tw = get_post_meta(get_the_ID(), '_dgt_speciality_tw', true);
$inst = get_post_meta(get_the_ID(), '_dgt_speciality_inst', true);
$in = get_post_meta(get_the_ID(), '_dgt_speciality_in', true);

$languages = wp_get_post_terms($post_id, 'language', array("fields" => "all"));
while ( have_posts() ) : the_post();
?>

<section id="flex-agent-information">
  <div class="flex-wrap-information">
    <div class="flex-text-img-content">
      <div class="flex-agent-img">
        <?php if ( has_post_thumbnail() ) { ;?>
        <?php the_post_thumbnail('full'); ?>
        <?php } else{ ;?>
        <img src="<?php echo get_template_directory_uri().'/images/blog-default.jpg';?>" alt="<?php the_title();?>">
        <?php };?>
      </div>
      <article class="flex-agent-description">
        <h1 class="flex-ag-title"><?php echo get_the_title(); ?></h1>
        <h3 class="flex-ag-position"><?php echo $title ;?></h3>
        <div class="idx-card-social">
          <?php if(!empty($fb)): ?>
          <a class="idx-social-link clidxboost-icon-facebook"><span>Facebook</span></a>
          <?php endif;?>
          <?php if(!empty($tw)): ?>
          <a class="idx-social-link clidxboost-icon-twitter"><span>Twitter</span></a>
          <?php endif;?>
          <?php if(!empty($inst)): ?>
          <a class="idx-social-link clidxboost-icon-instagram"><span>Instagram</span></a>
          <?php endif;?>
          <?php if(!empty($in)): ?>
          <a class="idx-social-link clidxboost-icon-linkedin"><span>LinkedIn</span></a>
          <?php endif;?>
        </div>
        <div class="idx-ag-content">
          <?php the_content(); ?>
        </div>
      </article>
      <button id="btn-read">
        <span class="tx_a">Read more</span>
        <span class="tx_b">Read less</span>
      </button>
    </div>
    <div class="flex-agent-form">
      <div class="form-content">
        <div class="avatar-content">
          <div class="avatar-information">
            <h2>Contact Agent</h2>
            <a class="phone-avatar" href="tel:3057666799">Tel. 305-766-6799</a>
            <a class="phone-avatar" href="mailto:f.fiornovelli@hotmail.com">f.fiornovelli@hotmail.</a>
          </div>
        </div>
        <form method="post" id="flex-idx-property-form">
          <input type="hidden" name="action" value="flex_idx_request_property_form">
          <input type="hidden" name="origin" value="http://betaidxb.staging.wpengine.com/property/46-star-island-dr-miami-beach-fl-33139-a10172834">
          <input type="hidden" name="price" id="flex_idx_form_price" value="48000000">
          <input type="hidden" id="flex_idx_form_mls_num" name="mls_num" value="A10172834">
          <input type="hidden" class="name_share" value="46 Star Island Dr">
          <input type="hidden" class="link_share" value="http://betaidxb.staging.wpengine.com/property/46-star-island-dr-miami-beach-fl-33139-a10172834">
          <input type="hidden" class="picture_share" value="//retsimages.s3.amazonaws.com/34/A10172834_1.jpg">
          <input type="hidden" class="caption_sahre" value="Be wowed at first glance from the dramatic red brick drive flanked by graceful palms to the Venetian-style arcade that ushers you inside. Feast your eyes on the soaring, light-filled expanse with its colorful frescos, intricate ceilings, and rich textures covering every surface. Built in 1924 by entrepreneur Carl Fisher and fully renovated in 2017, 46 Star Island Drive was born to show off. Casual and formal spaces inside blend seamlessly with a stunning outdoor oasis, offering magnificent spaces for intimate or large-scale gatherings. Escape from your escape to your luxurious master, a sanctuary worthy of retreat.">
          <input type="hidden" class="description_share" value="Be wowed at first glance from the dramatic red brick drive flanked by graceful palms to the Venetian-style arcade that ushers you inside. Feast your eyes on the soaring, light-filled expanse with its colorful frescos, intricate ceilings, and rich textures covering every surface. Built in 1924 by entrepreneur Carl Fisher and fully renovated in 2017, 46 Star Island Drive was born to show off. Casual and formal spaces inside blend seamlessly with a stunning outdoor oasis, offering magnificent spaces for intimate or large-scale gatherings. Escape from your escape to your luxurious master, a sanctuary worthy of retreat.">
          <div class="gform_body">
            <ul class="gform_fields">
              <li class="gfield">
                <label class="gfield_label" for="first_name">First Name</label>
                <div class="ginput_container ginput_container_text">
                  <input required="" class="medium" name="first_name" id="first_name" type="text" value="" placeholder="First Name*">
                </div>
              </li>
              <li class="gfield">
                <label class="gfield_label" for="first_name">Last Name</label>
                <div class="ginput_container ginput_container_text">
                  <input class="medium" name="last_name" id="last_name" type="text" value="" placeholder="Last Name*">
                </div>
              </li>
              <li class="gfield">
                <label class="gfield_label" for="email">Email</label>
                <div class="ginput_container ginput_container_email">
                  <input required="" class="medium" name="email" id="email" type="email" value="" placeholder="Email*">
                </div>
              </li>
              <li class="gfield">
                <label class="gfield_label" for="phone">Phone</label>
                <div class="ginput_container ginput_container_email">
                  <input class="medium" name="phone" id="phone" type="text" value="" placeholder="Phone*">
                </div>
              </li>
              <li class="gfield comments">
                <label class="gfield_label" for="message">Comments</label>
                <div class="ginput_container">
                  <textarea class="medium textarea" name="message" id="message" type="text" value="" placeholder="Comments" rows="10" cols="50">I am interested in 46 Star Island Dr Miami Beach FL, 33139</textarea>
                </div>
              </li>
              <li class="gfield requiredFields">* Required Fields</li>
              <div class="gform_footer">
                <input class="gform_button button gform_submit_button_5" type="submit" value="Request Information">
              </div>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php if(!empty($filter_agent)): ?>
<section id="flex-agent-listing">
  <article class="flex-block-description">
      <h2 class="flex-page-title">MY AGENT LISTINGS </h2>
      <?php echo do_shortcode('[idx_agent_filter id="'.$filter_agent.'" type="agent"]')?>
  </article>
</section>
<?php endif;?>

<?php endwhile; get_footer(); ?>
<?php get_footer(); ?>
<script type="text/javascript">
  jQuery(document).on('click', '#btn-read', function() {
    jQuery(this).parent().toggleClass('view-more-text');
  });
</script>
 