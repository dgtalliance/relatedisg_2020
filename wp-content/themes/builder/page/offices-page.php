<?php 
/*
Template Name: Offices Page
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="offices-page">

  <section class="ms-section ms-animate" id="main-banner">
    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/offices-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Our Offices">
    </div>
  </section>

  <section class="ms-section ms-animate" id="our-offices">
    <h1 class="ms-st-title">Our Offices</h1>
    <div class="ms-wrap-menu">
      <nav>
        <ul>
          <li><a href="#" title="Aventura">Aventura</a></li>
          <li><a href="#" title="Brickell">Brickell</a></li>
          <li><a href="#" title="Coral Gables">Coral Gables</a></li>
          <li><a href="#" title="Edgewater">Edgewater</a></li>
          <li><a href="#" title="Fort Lauderdale">Fort Lauderdale</a></li>
          <li><a href="#" title="Weston">Weston</a></li>
        </ul>
      </nav>
    </div>

    <div class="ms-wrap-slider">
      <div class="ms-slider" id="offices-slider">

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/01-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Aventura">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Aventura</h2>
            <address class="ms-address">2875 NE 191st Street • Suite 103 <span>Aventura, FL 33180</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:3059326365">305.932.6365</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_10-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Aventura">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Carolina Gerdts <span>Sales Manager</span></h3>
                <a href="tel:9548540730" class="ms-phone">C 954.854.0730</a>
                <a href="mailto:carolina@relatedisg.com" class="ms-email">carolina@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/02-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Brickell">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Brickell</h2>
            <address class="ms-address">75 SE 6th Street • Suite 101 <span>Miami, FL 33131</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:3059326365">305.932.6365</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_05-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Brickell">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Alberto Carrillo <span>Sales Manager</span></h3>
                <a href="tel:3059754909" class="ms-phone">C 305.975.4909</a>
                <a href="mailto:albert@relatedisg.com" class="ms-email">albert@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/03-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Coral Gables">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Coral Gables</h2>
            <address class="ms-address">178 Giralda Avenue • 2nd Floor <span>Coral Gables, FL 33134</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:3057749522">305.774.9522</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_07-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Coral Gables">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Liz Lopez <span>Sales Manager</span></h3>
                <a href="tel:3057675589" class="ms-phone">C 305.767.5589</a>
                <a href="mailto:liz@relatedisg.com" class="ms-email">liz@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/04-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Edgewater">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Edgewater</h2>
            <address class="ms-address">350 NE 24th Street • Suite 103 <span>Miami, FL 33137</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:3053774500">305.377.4500</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_05-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Edgewater">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Alberto Carrillo <span>Sales Manager</span></h3>
                <a href="tel:3059754909" class="ms-phone">C 305.975.4909</a>
                <a href="mailto:albert@relatedisg.com" class="ms-email">albert@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/05-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Fort Lauderdale">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Fort Lauderdale</h2>
            <address class="ms-address">701 E Broward Blvd • Suite B <span>Fort Lauderdale, FL 33137</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:3059326365">305.932.6365</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_10-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Fort Lauderdale">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Carolina Gerdts <span>Sales Manager</span></h3>
                <a href="tel:9548540730" class="ms-phone">C 954.854.0730</a>
                <a href="mailto:carolina@relatedisg.com" class="ms-email">carolina@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ms-item">
          <div class="ms-wrap-img">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/offices/06-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Weston">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Weston</h2>
            <address class="ms-address">1528 Weston Road <span>Weston, FL 33326</span></address>
            <span class="ms-separator"></span>
            <span class="ms-phone">Phone • <a href="tel:9549085550">954.908.5550</a></span>
            <div class="ms-wrap-btn"><button class="ms-link">View on map</button></div>
            <div class="ms-agent-detail">
              <div class="ms-wrap-img">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_10-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Weston">
              </div>
              <div class="ms-min-info">
                <h3 class="ms-sb-title">Carolina Gerdts <span>Sales Manager</span></h3>
                <a href="tel:9548540730" class="ms-phone">C 954.854.0730</a>
                <a href="mailto:carolina@relatedisg.com" class="ms-email">carolina@relatedisg.com</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php endwhile; get_footer(); ?> 