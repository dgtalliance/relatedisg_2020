<?php 
/*
Template Name: Broker Dashboard Page
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="broker-page">

  <section class="ms-section ms-animate" id="welcome">
    <h1 class="ms-st-title">Broker <span>Dashboard</span></h1>
    <p>All your real estate and marketing <span>apps on one platform</span></p>

    <div class="ms-wrap-items">
      <a href="https://www.brokersumo.com/login" class="ms-item" target="_blank">
        <div class="ms-bt-item">
          <span class="ms-icon-item ms-icon-sumo"></span>
          <h2 class="ms-item-title">Broker <span>Sumo</span></h2>
        </div>
      </a>
      <a class="ms-item show-modal" href="javascript:void(0)" data-modal="comming_soon" rel="nofollow">
        <div class="ms-bt-item">
          <span class="ms-icon-item ms-icon-app"></span>
          <h2 class="ms-item-title">RelatedISG <span>Mobile App</span></h2>
        </div>
      </a>
      <a href="https://relatedisgdesignstudio.com/" class="ms-item" target="_blank">
        <div class="ms-bt-item">
          <span class="ms-icon-item ms-icon-studio"></span>
          <h2 class="ms-item-title">RelatedISG <span>Design Studio</span></h2>
        </div>
      </a>  
      <a href="http://cpanel.staging.idxboost.com/" class="ms-item" target="_blank">
        <div class="ms-bt-item">
          <span class="ms-icon-item ms-icon-crm"></span>
          <h2 class="ms-item-title">RelatedISG <span>CRM</span></h2>
        </div>
      </a>
      <a href="/relatedisg-video-website-crm-tutorials/" class="ms-item" target="_blank">
        <div class="ms-bt-item">
          <span class="ms-icon-item ms-icon-crm-tutorial"></span>
          <h2 class="ms-item-title">RelatedISG <span>CRM Tutorials</span></h2>
        </div>
      </a>
    </div>

    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/broker/broker-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Broker Dashboard">
    </div>
  </section>

  <section class="ms-section ms-animate" id="info-dashboard">
    <p><strong>BrokerSumo –</strong> For your transaction tracking, commission planning, accounting, and agent billing</p> 
    <p><strong>RelatedISG Mobile App –</strong> Empowering all of our agents to grow status and sales by reaching mobile app users with our company brand</p>
    <!--<div class="ms-wrap-store"><a class="ms-store-link" title="Google Play" href="#"><span class="icon-google-play"></span></a><a class="ms-store-link" title="App Store" href="#"><span class="icon-app-store"></span></a></div>-->
    <p><strong>RelatedISG Design Studio –</strong> Our marketing center featuring a library of branded designs for agents to easily customize sophisticated print and social media collateral and process their print orders with just a few clicks</p>
    <p><strong>Customer Relationship Management (CRM) –</strong> Our custom CRM allows you to seamlessly manage your real estate business from one platform. Manage real estate leads, track lead generation campaigns, manage contacts, upload documents and contracts, manage your calendar, and access various real estate lead websites</p>
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

<?php endwhile; get_footer(); ?> 