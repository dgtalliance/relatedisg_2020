<?php
global $flex_idx_info;
global $dgtForms;
$idx_contact_email = isset($flex_idx_info['agent']['agent_contact_email_address']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_email_address']) : '';
$idx_contact_phone = isset($flex_idx_info['agent']['agent_contact_phone_number']) ? sanitize_text_field($flex_idx_info['agent']['agent_contact_phone_number']) : '';
?>

    <?php if( get_post_type() !== 'flex-idx-pages' ){ ?>
    <footer id="footer" class="ms-section ms-animate" role="contentinfo">
      <div class="ms-wrap-footer">
        <div class="ms-footer-logo">
          <?php idx_the_custom_logo_header_boots(); ?>
        </div>

        <div class="ms-footer-social">
          <div class="ms-social">
            <?php if (!empty($flex_idx_info["social"]["facebook_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["facebook_social_url"]; ?>"
                class="ms-link idx-icon-facebook" title="Navigate to Facebook" target="_blank" 
                rel="nofollow"><span>Facebook</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["twitter_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["twitter_social_url"]; ?>"
                class="ms-link idx-icon-twitter" title="Navigate to Twitter" target="_blank"
                rel="nofollow"><span>Twitter</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["gplus_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["gplus_social_url"]; ?>"
                class="ms-link idx-icon-google-plus" title="Navigate to Google+" target="_blank"
                rel="nofollow"><span>Google+</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["youtube_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["youtube_social_url"]; ?>"
                class="ms-link idx-icon-youtube-logo" title="Navigate to Youtube" target="_blank"
                rel="nofollow"><span>YouTube</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["instagram_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["instagram_social_url"]; ?>"
                class="ms-link idx-icon-instagram" title="Navigate to Instagram" target="_blank"
                rel="nofollow"><span>Instagram</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["linkedin_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["linkedin_social_url"]; ?>"
                class="ms-link idx-icon-linkedin2" title="Navigate to Linked In" target="_blank"
                rel="nofollow"><span>Linked In</span></a>
            <?php endif; ?>
            <?php if (!empty($flex_idx_info["social"]["pinterest_social_url"])): ?>
              <a href="<?php echo $flex_idx_info["social"]["pinterest_social_url"]; ?>"
                class="ms-link idx-icon-pinterest-p" title="Navigate to Pinterest" target="_blank"
                rel="nofollow"><span>Pinterest</span></a>
            <?php endif; ?>
          </div>
          
          <div class="ms-wrap-newsletter">
            <h3 class="ms-wrap-title">Receive the latest updates <span>in your inbox</span></h3>
            <form action="" method="POST">
              <label for="email-newsletter">Email Address*</label>
              <input type="email" id="email-newsletter" class="ms-input" placeholder="Email Address*">
              <button class="ms-btn">Sign Up</button>
              <p class="newsletter-buble">Sign up to power your next move. Claim your free RelatedISG account to save your favorite listings and searches, access listing details and work with an agent.</p>
            </form>
          </div>
        </div>

        <div class="ms-footer-menu">
          <nav class="ms-ft-menu-a">
            <ul>
              <li>
                <a href="/" title="Home">Home</a>
              </li>
              <li>
                <a href="/i-want-to-buy/" title="Buy">Buy</a>
              </li>
              <li>
                <a href="/i-want-to-rent/" title="Rent">Rent</a>
              </li>
              <li>
                <a href="/sell/" title="Sell">Sell</a>
              </li>
              <li>
                <a href="/neighborhoods/" title="Neighborhoods">Neighborhoods</a>
              </li>
              <li>
                <a href="/developments/" title="Developments">Developments</a>
              </li>
              <li>
                <a href="https://www.isgmiamireport.com/" title="Miami Report" target="_blank">Miami Report</a>
              </li>
              <!--<li>
                <a href="/agents/" title="Agents">Agents</a>
              </li>-->
            </ul>
          </nav>

          <nav class="ms-ft-menu-b">
            <ul>
              <li>
                <a href="/search/" title="Search">Search</a>
              </li>
              <li>
                <a href="/about/" title="About Us">About Us</a>
              </li>
              <li>
                <a href="/offices/" title="Offices">Offices</a>
              </li>
              <li>
                <a href="/login" title="Login" class="ms-lg-btn" data-login="login">Login</a>
              </li>
              <li>
                <a href="/register" title="Register" class="ms-lg-btn" data-login="register">Register</a>
              </li>
              <li>
                <a href="/contact/" title="Contact">Contact</a>
              </li>
              <li>
                <a href="/broker-dashboard/" title="Broker Dashboard">Broker Dashboard</a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="ms-footer-cpr">
          <img class="ms-img" alt="Equal Housing Opportunity" data-real-type="image" 
            data-img="<?php echo get_template_directory_uri(); ?>/images/ms-eho.png" 
            src="<?php echo get_template_directory_uri(); ?>/images/temp.png">
          <p>Any information concerning development projects or real estate for sale is not intended to be an offer to sell, or a solicitation to Website visitors to buy, any real estate to residents of any jurisdiction where such an offer or solicitation is prohibited by law.</p>
        </div>

        <div class="ms-bottom-footer">
          <div class="ms-footer-section">
            <ul class="ms-sub-menu-footer">
              <li><a href="/terms-and-conditions/" title="Privacy" target="_blank">Privacy</a></li>
              <li><a href="/terms-and-conditions/#atospp-privacy" title="Terms of Service" target="_blank">Terms and Conditions</a></li>
              <li><a href="/accessibility/" title="Terms of Service" target="_blank">Accessibility</a></li>
            </ul>
            <p class="ms-copyright">© <?php echo date('Y'); ?> RELATEDISG. ALL RIGHTS RESERVED</p>
            <div class="ms-trem">
              DESIGN BY RELATEDISG MARKETING; DEVELOPED + POWERED BY <a href="http://www.tremgroup.com/" target="_blank" title="TREMGROUP"><span>TREM</span>GROUP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php } ?>

    <?php if (!empty(get_theme_mod('idx_languages_list'))){
      if (empty( get_theme_mod( 'idx_languages_list' ) ))  $idx_languages_list  = []; else  $idx_languages_list  = get_theme_mod( 'idx_languages_list' );
      if(
          ( array_key_exists('English', $idx_languages_list) && $idx_languages_list['English'] =="1" ) || 
          ( array_key_exists('Russian', $idx_languages_list) && $idx_languages_list['Russian'] =="1" ) || 
          ( array_key_exists('Spanish', $idx_languages_list) && $idx_languages_list['Spanish'] =="1" ) || 
          ( array_key_exists('Portuguese', $idx_languages_list) && $idx_languages_list['Portuguese'] =="1" ) ||
          ( array_key_exists('French', $idx_languages_list) && $idx_languages_list['French'] =="1" ) ||
          ( array_key_exists('Italian', $idx_languages_list) && $idx_languages_list['Italian'] =="1" ) ||
          ( array_key_exists('German', $idx_languages_list) && $idx_languages_list['German'] =="1" ) ||
          ( array_key_exists('Chinese', $idx_languages_list) && $idx_languages_list['Chinese'] =="1" )
      ) { ?>
    <div id="google_translate_element"></div>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateInit"></script>
    <script>
    function googleTranslateInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,ru,es,pt,fr,it,de,zh-TW',
        multilanguagePage: true,
        autoDisplay: true,
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
    </script>
    <?php } } ?>
    
    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/dgt/dgt-project-master.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/webfont.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/project.min.js"></script>
  </body>
</html>