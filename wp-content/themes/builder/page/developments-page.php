<?php 
/*
  Template Name: Developments Page
*/
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<main id="developments-page">

  <section class="ms-section ms-animate" id="welcome">    
    <div class="ms-slider">
      <div class="gs-container-slider" id="developments-welcome-slider">
        <div class="ms-item">
          <h2 class="ms-st-title">Exclusive Developments</h2>
          <h1 class="ms-title">
            Reach & Rise, <i>Residences at Brickell City Centre</i>
            <span>Miami</span>
          </h1>
          <img class="ms-img ms-lazy" alt="" data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-banner-01-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">          
        </div>

        <div class="ms-item">
          <h2 class="ms-st-title">Exclusive Developments</h2>
          <h1 class="ms-title">
            Armani <i>Casa</i>
            <span>Sunny Isles</span>
          </h1>
          <img class="ms-img ms-lazy" alt="" data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-banner-02-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">          
        </div>

        <div class="ms-item">
          <h2 class="ms-st-title">Exclusive Developments</h2>
          <h1 class="ms-title">
            Auberge <span>Fort Lauderdale</span>
          </h1>
          <img class="ms-img ms-lazy" alt="" data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-banner-03-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">          
        </div>

        <div class="ms-item">
          <h2 class="ms-st-title">Exclusive Developments</h2>
          <h1 class="ms-title">
            Auberge <span>Fort Lauderdale</span>
          </h1>
          <img class="ms-img ms-lazy" alt="" data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-banner-04-compressor.jpg" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">          
        </div>
      </div>      
    </div>
  </section>

  <section class="ms-section" id="buildings">
    <div class="ms-wrap-slider">
      <div class="ms-slider" id="developments-page-slider">

        <!--<div class="ms-item">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Aventura" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-alton-bay-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Alton Bay</h2>
            <address>3900 Alton Rd, Miami Beach, FL 33140</address>
            <p>Rising gracefully amid the turquoise waters of Biscayne Bay, Alton Bay brings the modern design of internationally acclaimed master architect Ricardo Bofill to the historic heart of Miami Beach, offering a residential enclave of luxury, convenience, and breathtaking views</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/alton-bay/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>-->

        <div class="ms-item ms-animate" id="item-1">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Auberge Beach Residences & SPA" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/auberge-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Auberge Beach Residences & SPA</h2>
            <address>2200 North Ocean Boulevard, Ft. Lauderdale, Florida 33305</address>
            <p>The innovative minds at the award-winning and internationally recognized design firm of Meyer Davis Design Studio have joined forces with Nichols Brosch Wurst Wolfe & Associates, the celebrated architectural firm renowned for their ground-breaking projects, to create the distinctive surroundings that will forever redefine luxury. Two striking towers with floor-to-ceiling glass allows spectacular views from every room of the flow-through floor plans and feature generous sunrise and sunset terraces to enjoy South Florida’s oceanfront breezes.</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/auberge-beach-residences-spa/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>          

        <div class="ms-item ms-animate" id="item-2">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Aventura" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-hyde-beach-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Hyde Beach House Hollywood</h2>
            <address>2801 E Hallandale Beach Blvd, Hallandale Beach, FL 33009</address>
            <p>Hyde Beach House pairs sophisticated design elements with the ultimate array of beach-inspired amenities and on-demand services to create Hollywood’s hottest residential-style resort. Steps from the pristine Atlantic Ocean, this sparkling glass-clad jewel features a private rooftop park with an al fresco movie theater, exclusive access to watersport rentals, and an expansive pool deck overlooking the Intracoastal Waterway.</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/the-residences-at-hyde-beach-house/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div> 

        <div class="ms-item ms-animate" id="item-3">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Aventura" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-brickell-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Reach & Rise, Residences at Brickell City Centre</h2>
            <address>88 SW 7th St, Miami, FL 33130</address>
            <p>A luxury residential tower in the heart of Miami, Rise Brickell City Centre features finished luxury residences with city-view terraces and a nearly one-acre amenity deck. Focused on sophisticated details and understated style, this is an address to be envied, the go-to destination for the discerning buyer.</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/reach-rise-residences-at-brickell-city-centre/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>

        <!--<div class="ms-item">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Aventura" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-muse-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">MUSE Residences</h2>
            <address>17141 Collins Ave, Sunny Isles Beach, FL 33160</address>
            <p>Muse is a boutique, residential high-rise located directly on the pristine white sand beaches of Sunny Isles Beach, Florida. The 50-stories tower offer only 68 oceanfront residences, including 2 and 3 bedroom units and full floor penthouses. </p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/muse/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>-->

        <div class="ms-item ms-animate" id="item-4">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Residences By Armani Casa" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/armani-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">Residences By Armani Casa</h2>
            <address>18975 Collins Ave, Sunny Isles Beach, FL 33160</address>
            <p>Pelli Clarke Pelli’s contemporary glass tower appears as one with the crystal-clear water of the Atlantic Ocean. Transparent terraces let you step into a dreamlike space suspended between earth and sky. Interiors by Armani/Casa create a world of serenity and elegance, and beautifully designed amenities offer the ultimate in true luxury. Residential interiors are modern and elegant yet truly relaxed with floor-to-ceiling windows offering incomparable views over countless miles of soft white sand and turquoise water.</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/residences-by-armani-casa/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>

        <div class="ms-item ms-animate" id="item-1">
          <div class="ms-wrap-img">
            <img class="ms-lazy" alt="Aventura" data-real-type="image" 
              data-img="<?php echo get_template_directory_uri(); ?>/images/developments/developments-fort-lauderdale-compressor.jpg" 
              src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          </div>
          <div class="ms-info">
            <h2 class="ms-item-title">W Residences Fort Lauderdale</h2>
            <address>3101 Bayshore Dr, Fort Lauderdale, FL 33304</address>
            <p>Perfectly positioned between the Atlantic Ocean and the Intracoastal, the W Residences Fort Lauderdale present a daring new vision for oceanfront luxury living. Boldly designed and precisely detailed, the W's 171 residences have been thoughtfully re-imagined. Oversized balconies, towering floor-to-ceiling windows, and panoramic beach and city views set the tone of W Fort Lauderdale’s signature ambiance. It’s an anything-but-ordinary experience in the heart of South Florida’s most vibrant waterfront community.</p>
            <div class="ms-wrap-btn">
              <a class="ms-btn" href="/building/w-residences-fort-lauderdale/">
                <span>More Information</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>  

</main>

<?php endwhile; ?> 

<?php get_footer(); ?> 