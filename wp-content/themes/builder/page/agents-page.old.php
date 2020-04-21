<?php
/* Template Name: Agents Page */
get_header();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.staging.idxboost.com/crm/broker/1a7945de-9b24-4971-b296-4738b0658192/agents",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$agents = json_decode($response, true);

curl_close($curl);
?>

<style>
  .ms-full {
    width: 48% !important;
  }

  .ms-full .ms-btn {
    margin-top: -20px;
  }

  .ms-full .ms-btn span {
    display: flex !important;
  }

  @media (max-width: 1439px) {
    .ms-full {
      width: 100% !important;
      text-align: left;
      margin-top: 15px !important;
    }

    .ms-full .ms-btn {
      margin-top: 0;
      margin-left: auto;
      margin-right: 0;
      display: block;
    }
  }
</style>

<?php while (have_posts()) : the_post(); ?>

  <main id="agents-page">
    <section class="ms-section ms-animate" id="main-banner">
      <div class="ms-wrap-img">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/images/agents/agents-layer-compressor.jpg" src="<?php echo get_template_directory_uri(); ?>/images/temp.png" class="ms-lazy" alt="Our agents">
      </div>
      <h2 class="ms-mt-title">Meet the agents <span>revolutionizing <i>real estate</i></span></h2>
    </section>

    <section class="ms-section ms-animate" id="find-agent">
      <span class="ms-pr-title">Found</span>
      <h2 class="ms-st-title"><?php echo count($agents); ?> agents</h2>
      <div class="ms-wrap-search">
        <form action="#" class="form-search" method="post">
          <ul class="flex-content-form">
            <li class="form-item">
              <span>Search by name</span>
              <input class="medium" name="name" type="text" value="" required="" placeholder="Search by name">
            </li>
            <li class="form-item">
              <span>Search by office</span>
              <input class="medium" name="name" type="text" value="" required="" placeholder="Search by office">
            </li>
            <li class="form-item ms-full">

              <button class="ms-btn" title="Search">
                <span>Search</span>
              </button>

              <!--<span>Search by neighborhood</span>
            <input class="medium" name="name" type="text" value="" required="" placeholder="Search by neighborhood of expertise">-->
            </li>
            <!--<li class="form-item">
            <span>Search by development</span>
            <input class="medium" name="name" type="text" value="" required="" placeholder="Search by development">
          </li>-->
          </ul>


        </form>
      </div>
      <p>Armed with “The Power of Relationships” and exceeding expectations, our agents look beyond the individual transaction. They provide in-depth market knowledge and the unsurpassed service you deserve. You are the number one priority.</p>
    </section>

    <section class="ms-section ms-animate" id="list-agent">
      <h2 class="ms-st-title">Find the agent that moves you</h2>
      <ul class="alphabet">
        <li><a class="active" href="#">a</a></li>
        <li><a href="#">b</a></li>
        <li><a href="#">c</a></li>
        <li><a href="#">d</a></li>
        <li><a href="#">e</a></li>
        <li><a href="#">f</a></li>
        <li><a href="#">g</a></li>
        <li><a href="#">h</a></li>
        <li><a href="#">i</a></li>
        <li><a href="#">j</a></li>
        <li><a href="#">k</a></li>
        <li><a href="#">l</a></li>
        <li><a href="#">m</a></li>
        <li><a href="#">n</a></li>
        <li><a href="#">o</a></li>
        <li><a href="#">p</a></li>
        <li><a href="#">q</a></li>
        <li><a href="#">r</a></li>
        <li><a href="#">s</a></li>
        <li><a href="#">t</a></li>
        <li><a href="#">u</a></li>
        <li><a href="#">v</a></li>
        <li><a href="#">w</a></li>
        <li><a href="#">x</a></li>
        <li><a href="#">y</a></li>
        <li><a href="#">z</a></li>
      </ul>
      <div class="list-agent">
        <?php foreach ($agents as $agent) : ?>
          <div class="ms-agent-detail">
            <div class="ms-agent-detail-wrapper">
              <a href="<?php echo $agent['agent_slug']; ?>" class="ms-wrap-img">
                <img class="ms-lazy_" data-real-type="image" data-img="<?php echo $agent['agent_photo_file']; ?>" src="<?php echo $agent['agent_photo_file']; ?>" alt="First Last">
              </a>
              <div class="ms-min-info">
                <span><?php echo $agent['first_name']; ?> <?php echo $agent['last_name']; ?></span>
                <span>Office <?php echo $agent['office_name']; ?></span>
                <a href="tel:+1<?php echo preg_replace('/[^\d+]/', '', $agent['contact_phone']); ?>" class="ms-phone">C <?php echo flex_agent_format_phone_number($agent['contact_phone']); ?></a>
                <a href="<?php echo $agent['agent_slug']; ?>" class="ms-email">Visit my website</a>
              </div>
            </div>
            <h3 class="ms-sb-title"><a href="<?php echo $agent['agent_slug']; ?>"><?php echo $agent['first_name']; ?> <?php echo $agent['last_name']; ?></a></h3>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>