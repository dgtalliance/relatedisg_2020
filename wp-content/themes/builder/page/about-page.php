<?php 
/*
Template Name: About Page
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<main id="about-page">

  <section class="ms-section ms-animate" id="welcome">
    <h1 class="ms-title">The Power to <span>move you.</span></h1>
    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/about-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="">
    </div>
  </section>

  <section class="ms-section ms-animate" id="about-us">
    <h2 class="ms-st-title">About Us</h2>
    <p>RelatedISG International Realty was founded in 2011 by International Sales Group owner Craig Studnicky, along with Jorge Perez, Chairman and CEO of Related Group.</p>
    <p>The general realty group is represented by top-producing agents and is headed by Alex Vidal, president, and a 21-year industry leader. Growing quickly and now encompassing six offices across Miami-Dade and Broward counties, RelatedISG is an expanding leader in residential and developer sales, and has come into the forefront of the development world as well.</p>
    <p>With extensive knowledge in every aspect of the field, the RelatedISG team has an outstanding track record of providing clients with exceptional and rewarding real estate experiences.</p>
  </section>

  <div class="ms-section ms-animate" id="time-line">
    <ul class="ms-time-line">
      <li>
        <h2 class="ms-line-year">2011</h2>
        <p>RelatedISG International Realty is founded by International Sales Group and Related Group</p>
      </li>
      <li>
        <h2 class="ms-line-year">2012</h2>
        <p>Opening of Aventura <span>and Downtown offices</span></p>
      </li>
      <li>
        <h2 class="ms-line-year">2014</h2>
        <p>Alex Vidal joins RelatedISG and opens the Fort Lauderdale office</p>
      </li>
      <li>
        <h2 class="ms-line-year">2015</h2>
        <p>Launch of the Rebranding of RelatedISG and “The Power of Relationships” tagline; Opening of the Edgewater office (formerly Downtown office)</p>
      </li>
      <li>
        <h2 class="ms-line-year">2016</h2>
        <p>Opening of the Coral <span>Gables office</span></p>
      </li>
      <li>
        <h2 class="ms-line-year">2017</h2>
        <p>Opening of <span>the Weston office</span></p>
      </li>
      <li>
        <h2 class="ms-line-year">2018</h2>
        <p>Opening of the <span>Brickell office</span></p>
      </li>
      <li>
        <h2 class="ms-line-year">2019</h2>
        <p>Launch of <span>RISG 2.0</span> Initiatives</p>
      </li>
    </ul>
  </div>

  <section class="ms-section ms-animate" id="our-mision">
    <h2 class="ms-st-title">Our Mission</h2>
    <p>To move people by providing guidance and support.</p>
  
    <h2 class="ms-st-title">Our Vision</h2>
    <p>To build and grow an extraordinary team of real estate professionals dedicated to exceeding expectations and leveraging the power of our relationships.</p>

    <h2 class="ms-st-title">Our Values</h2>
    <h3 class="ms-sb-title">Relationships</h3>
    <p>We believe in the Power of Relationships. The unique partnership between Related Group and ISG World has resulted in an international network of realtors boasting unparalleled sales expertise and superior marketing research in today’s upscale residential marketplace.</p>
    <h3 class="ms-sb-title">Information</h3>
    <p>We believe in the Power of Information. RelatedISG offers comprehensive research services to help agents and their clients understand the market. In addition, RelatedISG’s annual Miami Report is a highly regarded analysis of the South Florida real estate market.</p> 
    <h3 class="ms-sb-title">Service</h3>
    <p>We believe in the Power of Service. The RelatedISG team is focused on servicing clients seeking property in South Florida, whether it be residential, commercial or pre-construction/development properties.</p>
    <h3 class="ms-sb-title">Growth</h3>
    <p>We believe in the Power of Growth. We take pride in helping our agents achieve their goals and their full potential by providing them with training, educational assistance, career growth opportunities and cutting-edge marketing and technology.</p>
  </section>

  <section class="ms-animate" id="our-culture">
    <article class="ms-section">
      <h2 class="ms-title">Our Culture</h2>
      <p>We cultivate an environment of collaboration and the highest of standards so that everyone can succeed. We provide outstanding customer service through our consistent support, marketing, training and technology, leading to an organization of “raving fans” — agent recruits who rave about our company, brand and culture. It is this relationship with our agents that has helped our company grow steadfastly over the years. Their loyalty and our continuous dedication to their success is what keeps our momentum growing. In turn, each of our real estate associates brings this same commitment to you, whether you are buying, selling, renting or investing.</p>
      <div class="ms-wrap-img">
        <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/culture_img-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Our Culture">
      </div>
    </article>
  </section>

  <section class="ms-section ms-animate" id="leadership">
    <h2 class="ms-st-title">Leadership</h2>
    <ul class="ms-agent-list">
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_01-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Matt Allen">
        </a>
        <h3 class="ms-agent-title"><a href="#">Matt Allen</a></h3>
        <h4 class="ms-agent-stattus">Principal</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_02-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Craig Studnicky">
        </a>
        <h3 class="ms-agent-title"><a href="#">Craig Studnicky</a></h3>
        <h4 class="ms-agent-stattus">Principal</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_03-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Michael Ambrosio">
        </a>
        <h3 class="ms-agent-title"><a href="#">Michael Ambrosio</a></h3>
        <h4 class="ms-agent-stattus">Principal</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_04-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Alex Vidal">
        </a>
        <h3 class="ms-agent-title"><a href="#">Alex Vidal</a></h3>
        <h4 class="ms-agent-stattus">Principal</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_05-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Vice-President">
        </a>
        <h3 class="ms-agent-title"><a href="#">Alberto Carrillo</a></h3>
        <h4 class="ms-agent-stattus">Vice-President</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_06-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Veronica Gorson">
        </a>
        <h3 class="ms-agent-title"><a href="#">Veronica Gorson</a></h3>
        <h4 class="ms-agent-stattus">Chief Marketing Officer</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_10-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Carolina Gerdts">
        </a>
        <h3 class="ms-agent-title"><a href="#">Carolina Gerdts</a></h3>
        <h4 class="ms-agent-stattus">Sales Manager</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_07-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Liz Lopez">
        </a>
        <h3 class="ms-agent-title"><a href="#">Liz Lopez</a></h3>
        <h4 class="ms-agent-stattus">Sales Manager</h4>
      </li>
      <li>
        <a href="#" class="ms-wrap-img">
          <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/about/agent_08-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Rowena Luna">
        </a>
        <h3 class="ms-agent-title"><a href="#">Rowena Luna</a></h3>
        <h4 class="ms-agent-stattus">Marketing Director</h4>
      </li>
    </ul>
  </section>
</main>
<?php endwhile; get_footer(); ?> 