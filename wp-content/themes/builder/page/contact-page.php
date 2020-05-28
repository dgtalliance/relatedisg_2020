<?php 
/*
* Template Name: Contact Page
* Template Post Type: page
*/
get_header();

global $flex_idx_info;

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

$idx_contact_address = $idx_contact_address.' '.$idx_contact_address2.', '.$idx_contact_city.', '.$idx_contact_state.' '.$idx_contact_zip_code;

if ((empty($idx_contact_lat )) && (empty($idx_contact_lng ))){
$chlatlong = curl_init();
curl_setopt($chlatlong, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($idx_contact_address).'&key='.$flex_idx_info["agent"]["google_maps_api_key"]);
curl_setopt($chlatlong, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chlatlong, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($chlatlong, CURLOPT_FRESH_CONNECT, true);
curl_setopt($chlatlong, CURLOPT_VERBOSE, true);
$outputlatlong = curl_exec($chlatlong);
curl_close($chlatlong);

  $outtemporali=json_decode($outputlatlong,true);
  if ($outtemporali['status']=='OK') {
   foreach ($outtemporali['results'] as $keygeom => $valuegeome) {
     $idx_contact_lat=$valuegeome['geometry']['location']['lat'];
     $idx_contact_lng=$valuegeome['geometry']['location']['lng'];
   }
  }
}

while ( have_posts() ) : the_post(); ?>

<main id="contact-page">

	<section class="ms-section ms-animate" id="main-banner">
    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/contact/contact-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="We are here for you">
    </div>
    <h2 class="ms-mt-title">We are here <span>for you.</span></h2>
  </section>

  <section class="ms-section ms-animate" id="contact-form">
  	<h2 class="ms-st-title">Need help?</h2>
  	<p>Please complete the form below and we will contact you.</p>
  	<div class="ms-wrap-contat-page">
			<?php echo do_shortcode('[flex_idx_contact_form]'); ?>
			<input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="<?php echo $idx_contact_email; ?>">
			<script type="text/javascript">jQuery(".flex-content-form .pt-name .medium").attr('placeholder','First Name*');
        jQuery(".flex-content-form .pt-lname .medium").attr('placeholder','Last Name*');
        jQuery(".flex-content-form .pt-email .medium").attr('placeholder','Email Address*');
        jQuery(".flex-content-form .pt-phone .medium").attr('placeholder','Phone Number');
        jQuery(".flex-content-form .textarea").attr('placeholder','Type your message here*');
      </script>
  	</div>
  </section>

  <section class="ms-section ms-animate" id="need-agent">
    <article class="ms-section">
      <h2 class="ms-title">Need an Agent?</h2>
			<p>Whether you are looking to buy, sell, rent or invest, 
			<span>our exceptional real estate professionals are ready</span> 
			to serve clients across the globe.</p>
			<a href="/agents/" class="ms-btn" title="Find an agent">
				<span>Find an agent</span>
			</a>
      <div class="ms-wrap-img">
        <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/contact/need-agent-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Need an Agent">
      </div>
    </article>
  </section>

  <div class="ms-section ms-animate" id="list-agents">
  	<div class="ms-slider">
      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Aventura</h2>
          <address class="ms-address">2875 NE 191st Street <span>Suite 200</span> Aventura, FL 33180</address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3059326365">305.932.6365</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/2875+NE+191st+St,+Aventura,+FL+33180,+EE.+UU./@25.9528206,-80.1455824,17z/data=!3m1!4b1!4m5!3m4!1s0x88d9ac5802f39751:0x63ed2f69411892ab!8m2!3d25.9528158!4d-80.1433937" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>

      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Brickell</h2>
          <address class="ms-address">75 SE 6th Street <span>Suite 101</span> Miami, FL 33131</address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3053511818">305.351.1818</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/75+SE+6th+St+Ste+101,+Miami,+FL+33131,+EE.+UU./@25.7685451,-80.1935038,17z/data=!3m1!4b1!4m5!3m4!1s0x88d9b68333642001:0x28d2ef373eee5e00!8m2!3d25.7685403!4d-80.1913151" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>

      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Coral Gables</h2>
          <address class="ms-address">178 Giralda Avenue <span>2nd Floor</span> Coral Gables, FL 33134</address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3057749522">305.774.9522</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/178+Giralda+Ave+2nd+Floor,+Coral+Gables,+FL+33134,+EE.+UU./@25.7511757,-80.2605766,17z/data=!3m1!4b1!4m5!3m4!1s0x88d9b799c09a1ff3:0x31b6fa7819117572!8m2!3d25.7511709!4d-80.2583879" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>

      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Edgewater</h2>
          <address class="ms-address">350 NE 24th Street <span>Suite 103</span> Miami, FL 33137</address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3053774500">305.377.4500</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/350+NE+24th+St+%23103,+Miami,+FL+33137,+EE.+UU./@25.7999208,-80.1910465,17z/data=!3m1!4b1!4m5!3m4!1s0x88d9b6aa6862cfff:0x6d76cab6d06bd6b0!8m2!3d25.799916!4d-80.1888578" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>

      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Fort Lauderdale</h2>
          <address class="ms-address">123 Main Street <span>Suite 103</span> Fort Lauderdale, FL 33137</address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3059326365">305.932.6365</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/Miami,+Florida+33137,+EE.+UU./@25.8140836,-80.1955645,14z/data=!3m1!4b1!4m8!1m2!2m1!1s123+Main+Street+Suite+103+Fort+Lauderdale,+FL+33137!3m4!1s0x88d9b1583facb0b7:0x2550135a862edc1d!8m2!3d25.8207159!4d-80.1819268" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>

      <div class="ms-item">
        <div class="ms-info">
          <h2 class="ms-item-title">Weston</h2>
          <address class="ms-address">1528 Weston Road <span>Weston, FL 33326</span></address>
          <span class="ms-separator"></span>
          <span class="ms-phone">Phone <a href="tel:3059085550">305.908.5550</a></span>
          <div class="ms-wrap-btn"><a href="https://www.google.com/maps/place/1528+Weston+Rd,+Weston,+FL+33326,+EE.+UU./@26.0997045,-80.3682624,17z/data=!3m1!4b1!4m5!3m4!1s0x88d90a01ca08a101:0x3bb39e8143bcc83f!8m2!3d26.0996997!4d-80.3660737" class="ms-link" target="_blank">View on map</a></div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php endwhile; get_footer(); ?>