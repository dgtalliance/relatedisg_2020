<?php 
/*
Template Name: Join as an agent
*/
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<main id="join-page">
  <section class="ms-section ms-animate" id="main-banner">
    <div class="ms-wrap-img">
      <img 
      data-real-type="image" 
      data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-00-compressor.jpg" 
      src="<?php echo get_template_directory_uri(); ?>/images/temp.png" 
      class="ms-lazy" 
      alt="Join as an agent">
    </div>
    <h2 class="ms-mt-title">Are you ready to make <span>your next move?</span></h2>
  </section>

  <section class="ms-section" id="listDetail">
    <div class="ms-wrap-slider">
      <div class="ms-slider">
        <div class="ms-item ms-animate" id="item-1">
          <div class="ms-wrap-img">
            <img class="ms-lazy" 
            alt="The Power of Relationships" 
            data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-01-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">The Power of Relationships</h2>
            <p>International Sales Group and Related Group, two of the most innovative and successful real estate organizations in the industry, make up RelatedISG. Our team has an outstanding track record of providing our agents and their clients with exceptional and rewarding real estate experiences.</p>
            <img class="ms-lazy ms-img-xk" 
            alt="The Power of Relationships" 
            data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-x0-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
        </div>

        <div class="ms-item ms-animate" id="item-2">
          <div class="ms-wrap-img">
            <img class="ms-lazy" 
            alt="Our Culture" 
            data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-02-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Our Culture</h2>
            <p>We believe that your success is our success. We care and connect with our people. At RelatedISG, we provide the greatest tools, service and assistance to our agents so they can build their skills and find opportunities to grow and succeed. With this in mind, we offer transaction coordinators to handle all aspects of each agent transaction from contract to closing, so that our agents are free to do what they do best – sell.</p>
          </div>
        </div>

        <div class="ms-item ms-animate" id="item-3">
          <div class="ms-wrap-img">
            <img class="ms-lazy" 
            alt="Our Marketing" 
            data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-03-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Our Marketing</h2>
            <p>RelatedISG has its own marketing division that is supported by the marketing division for ISG, the award-winning creative talent behind the marketing materials developed for luxury developments. From research and strategy to creative design, our in-house marketing team plans, produces and implements the most effective marketing campaigns, including your personal brand.</p>
          </div>
        </div>

        <div class="ms-item ms-sp-fr ms-animate" id="item-4">
          <div class="ms-list-img">
            <div class="ms-wrap-img">
              <img class="ms-lazy" 
              alt="Our Training" 
              data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-04-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
            </div>
            <div class="ms-wrap-img">
              <img class="ms-lazy" 
              alt="Our Training" 
              data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-05-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
            </div>
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Our Training</h2>
            <p>RelatedISG’s agent training programs are tailored to the individual improvement<br> 
            of each agent. Company-wide training includes:</p>

            <p>Art of the Listing Presentation • Leveraging the Related and ISG Brands<br>
            • Commercial Transactions • Prospecting Social Media</p>

            <p>• No-Excuses Coaching Program:<br>
            Advice, empowerment, motivation and guest<br> 
            speakers to accelerate our agents’ success</p>

            <p>• Off The Beaten Path Learning Series:<br>
            Designed to enrich the mindset of agents,<br> 
            making them the best they can be in real estate</p>

            <p>• Productivity Coaching Program:<br>
            Empowers new licensees to create their own success through<br> 
            lead generation, training accountability and mindset</p>
          </div>
        </div>

        <div class="ms-item ms-animate" id="item-5">
          <div class="ms-wrap-img">
            <img class="ms-lazy" 
            alt="Our Technology" 
            data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-06-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Our Technology</h2>
            <p>RelatedISG offers all of your real estate and marketing apps in one place — the Broker Dashboard. From easy-to-use transaction coordination software and a custom marketing collateral platform, to an all-in-one CRM program, the Broker Dashboard is a one-stop-shop for the tech tools you need to succeed.</p>
          

            <div class="ms-list-bs ms-img-xk">
              <a href="https://www.brokersumo.com/login" class="ms-sb-item" target="_blank">
                <div class="ms-bt-item">
                  <span class="ms-icon-item ms-icon-sumo"></span>
                  <h2 class="ms-bs-title">Broker <span>Sumo</span></h2>
                </div>
              </a>
              <a class="ms-sb-item show-modal" href="javascript:void(0)" data-modal="comming_soon" rel="nofollow">
                <div class="ms-bt-item">
                  <span class="ms-icon-item ms-icon-app"></span>
                  <h2 class="ms-bs-title">RelatedISG <span>Mobile App</span></h2>
                </div>
              </a>
              <a href="https://relatedisgdesignstudio.com/" class="ms-sb-item" target="_blank">
                <div class="ms-bt-item">
                  <span class="ms-icon-item ms-icon-studio"></span>
                  <h2 class="ms-bs-title">RelatedISG <span>Design Studio</span></h2>
                </div>
              </a>  
              <a href="http://cpanel.staging.idxboost.com/" class="ms-sb-item" target="_blank">
                <div class="ms-bt-item">
                  <span class="ms-icon-item ms-icon-crm"></span>
                  <h2 class="ms-bs-title">RelatedISG <span>CRM</span></h2>
                </div>
              </a>
              <a href="/relatedisg-video-website-crm-tutorials/" class="ms-sb-item" target="_blank">
                <div class="ms-bt-item">
                  <span class="ms-icon-item ms-icon-crm-tutorial"></span>
                  <h2 class="ms-bs-title">RelatedISG <span>CRM</span></h2>
                </div>
              </a>

            </div>   

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ms-section ms-animate ms-special-banner" id="need-agent">
    <article class="ms-section">
      <h2 class="ms-title">Ready to make <span>the next move?</span></h2>
      <p>Join us and be part of one of the most innovative real <span>estate firms today!</span></p>
      <div class="ms-wrap-btn">
        <button class="ms-btn show-modal" aria-label="Join now" data-modal="modal_contact_join">
          <span>Join now</span>
        </button>
      </div>		
      <div class="ms-wrap-img">
        <img class="ms-lazy" 
        data-real-type="image" 
        data-img="<?php echo get_template_directory_uri(); ?>/images/agents/img-07-compressor.jpg" 
        src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Need an Agent">
      </div>
      <div class="overlay_modal ppc-contact" id="modal_contact_join">
        <div class="modal_cm">
          <button data-id="modal_contact_join" class="close close-modal" data-frame="modal_mobile">Close <span></span></button>
          <div class="content_md">
            <div class="heder_md">
              <h2>Join Now</h2>
            </div>
            <div class="body_md">
              <?php echo do_shortcode('[flex_idx_contact_form id_form="contact_modal_join"]'); ?>
              <input type="hidden" name="idx_contact_email_temp" class="idx_contact_email_temp" value="<?php echo $idx_contact_email; ?>">
              <script>
                var $newsletterFName = jQuery("#modal_contact_join .flex-content-form .pt-name .medium"),
                    $newsletterLName = jQuery("#modal_contact_join .flex-content-form .pt-lname .medium"),
                    $newsletterEmail = jQuery("#modal_contact_join .flex-content-form .pt-email .medium"),
                    $newsletterPhone = jQuery("#modal_contact_join .flex-content-form .pt-phone .medium"),
                    $newsletterInput = jQuery('#modal_contact_join #contact_modal_join #Newsletter'),
                    $newsletterLabel = jQuery('#modal_contact_join #contact_modal_join #Newsletter + label');

                $newsletterFName.attr('placeholder','First Name*');
                $newsletterLName.attr('placeholder','Last Name*');
                $newsletterEmail.attr('placeholder','E-mail Address*');
                $newsletterPhone.attr('placeholder','Phone Number');      
                $newsletterInput.addClass('ib-icheck');
                $newsletterLabel.addClass('ib-clabel');
                $newsletterLabel.text('Are you a licensed real estate agent?');
              </script>
            </div>
          </div>
        </div>
        <div class="overlay_modal_closer" data-frame="modal_mobile" data-id="modal_contact_join"></div>
      </div>
    </article>
  </section>
</main>

<div class="overlay_modal ms-animate" id="comming_soon">
  <div class="modal_cm">
    <button data-id="comming_soon" class="close close-modal ib-close-mproperty" data-frame="modal_mobile">Close <span></span></button>
    <div class="ms-wrap-message">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/logo_white.png" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Broker Dashboard">
      <span class="ms-title">Comming Soon</span>
    </div>
  </div>
  <div class="overlay_modal_closer" data-frame="modal_mobile" data-id="comming_soon"></div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
