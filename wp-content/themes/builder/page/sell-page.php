<?php 
/*
Template Name: Sell Page
*/
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<main id="sell-page">

  <section class="ms-section ms-animate" id="main-banner">
    <div class="ms-wrap-img">
      <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/sell/sell-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Our Offices">
    </div>
    <h2 class="ms-mt-title">Sell your property <i>with us</i></h2>
  </section>

  <section class="ms-section ms-animate" id="find-home">
    <p>We put you in touch with a local real estate professional in your market who determines the accurate market price of your property and finds the right buyer. Our experts are happy to assist you with a free valuation of your property.</p>
    <div class="ms-wrap-btn">
      <a class="ms-btn" href="/i-want-to-sell/" title="Find out what your home is worth">
        <span>Find out what your home is worth</span>
      </a>
    </div>
  </section>

  <section class="ms-section ms-animate" id="why-sell">
    <h2 class="ms-st-title">Why sell <span>with us?</span></h2>

    <ul class="why-sell-list">
      <li>
        <div class="why-sell-item">
          <span>20+</span><span>years</span>
        </div>
        <p>The parent companies of RelatedISG have been in business for over 20 years and are two of the most influential real estate organizations in the industry.</p>
      </li>
      <li>
        <div class="why-sell-item">
          <span>500+</span><span>agents</span>
        </div>
        <p>We tap into the power of our network giving your property impactful exposure and direct access to successful real estate professionals.</p>
      </li>
      <li>
        <div class="why-sell-item">
          <span>6</span><span>offices</span>
        </div>
        <p>With neighborhood offices throughout South Florida, our firm offers a boutique feel coupled with a vast pool of resources.</p>
      </li>
    </ul>    
  </section>

  <section class="ms-section ms-animate" id="need-agent">
    <article class="ms-section">
      <h2 class="ms-title">Need an Agent?</h2>
			<p>Whether you are looking to buy, sell, rent or invest, 
			<span>our exceptional real estate professionals are ready</span> 
      to serve clients across the globe.</p>
      <div class="ms-wrap-btn">
        <a href="/agents/" class="ms-btn" title="Find an agent">
          <span>Find an agent</span>
        </a>
      </div>
      <div class="ms-wrap-img">
        <img class="ms-lazy" data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/contact/need-agent-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" alt="Need an Agent">
      </div>
    </article>
  </section>

</main>
<?php endwhile; ?>

<?php get_footer(); ?>