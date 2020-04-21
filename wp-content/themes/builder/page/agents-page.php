<?php
/* Template Name: Agents Page */
get_header();

$curl = curl_init();

$site_registration_key = get_option('idxboost_registration_key');
$query_agents_url = implode('/', [FLEX_IDX_BASE_URL, "crm/broker", $site_registration_key, "agents"]);

$query_agent_name = isset($_GET['agent_name']) ? filter_var(trim($_GET['agent_name']), FILTER_SANITIZE_STRING) : null;
$query_agent_office = isset($_GET['agent_office']) ? filter_var(trim($_GET['agent_office']), FILTER_SANITIZE_STRING) : null;
$agent_sort_preference = isset($_GET['agent_sort_preference']) ? filter_var(trim($_GET['agent_sort_preference']), FILTER_SANITIZE_STRING) : null;

$query_agents_url_params = http_build_query([
    'agent_name' => $query_agent_name,
    'agent_office' => $query_agent_office,
    'agent_sort_preference' => $agent_sort_preference
]);

$query_agents_url_with_params = implode('?', [$query_agents_url, $query_agents_url_params]);

curl_setopt_array($curl, array(
    CURLOPT_URL => $query_agents_url_with_params,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
curl_close($curl);

$agents_data = json_decode($response, true);
$agents = empty($agents_data['agents']) ? [] : $agents_data['agents'];
$offices = empty($agents_data['offices']) ? [] : $agents_data['offices'];
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

<script>
    jQuery(function() {
        jQuery("#crm_filter_sort_agents").on("click", "a", function(e) {
            e.preventDefault();
            var letter = jQuery(this).data("letter");
            jQuery("#_agent_sort_preference").val(letter);
            jQuery("#crm_filter_agents_form").submit();
        });
    });
</script>

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
                <form id="crm_filter_agents_form" action="<?php echo get_permalink(get_the_ID()); ?>" class="form-search" method="GET">
                    <input type="hidden" id="_agent_sort_preference" name="agent_sort_preference" value="">
                    <ul class="flex-content-form">
                        <li class="form-item">
                            <span>Search by name</span>
                            <input class="medium" name="agent_name" type="text" value="<?php echo $query_agent_name; ?>" placeholder="Search by name">
                        </li>
                        <?php if (!empty($offices)) : ?>
                            <li class="form-item">
                                <span>Search by office</span>
                                <select name="agent_office">
                                    <option value="">Search by office</option>
                                    <?php foreach ($offices as $office) : ?>
                                        <option <?php if ($office['id'] == $query_agent_office) : ?> selected <?php endif; ?> value="<?php echo $office['id']; ?>"><?php echo $office['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php /*<input class="medium" name="agent_office" type="text" value="<?php echo $query_agent_office; ?>" placeholder="Search by office">*/ ?>
                            </li>
                        <?php endif; ?>
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

        <?php if (!empty($agents)) : ?>
            <section class="ms-section ms-animate" id="list-agent">
                <h2 class="ms-st-title">Find the agent that moves you</h2>
                <ul class="alphabet" id="crm_filter_sort_agents">
                    <li><a data-letter="a" href="#">a</a></li>
                    <li><a data-letter="b" href="#">b</a></li>
                    <li><a data-letter="c" href="#">c</a></li>
                    <li><a data-letter="d" href="#">d</a></li>
                    <li><a data-letter="e" href="#">e</a></li>
                    <li><a data-letter="f" href="#">f</a></li>
                    <li><a data-letter="g" href="#">g</a></li>
                    <li><a data-letter="h" href="#">h</a></li>
                    <li><a data-letter="i" href="#">i</a></li>
                    <li><a data-letter="j" href="#">j</a></li>
                    <li><a data-letter="k" href="#">k</a></li>
                    <li><a data-letter="l" href="#">l</a></li>
                    <li><a data-letter="m" href="#">m</a></li>
                    <li><a data-letter="n" href="#">n</a></li>
                    <li><a data-letter="o" href="#">o</a></li>
                    <li><a data-letter="p" href="#">p</a></li>
                    <li><a data-letter="q" href="#">q</a></li>
                    <li><a data-letter="r" href="#">r</a></li>
                    <li><a data-letter="s" href="#">s</a></li>
                    <li><a data-letter="t" href="#">t</a></li>
                    <li><a data-letter="u" href="#">u</a></li>
                    <li><a data-letter="v" href="#">v</a></li>
                    <li><a data-letter="w" href="#">w</a></li>
                    <li><a data-letter="x" href="#">x</a></li>
                    <li><a data-letter="y" href="#">y</a></li>
                    <li><a data-letter="z" href="#">z</a></li>
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
        <?php endif; ?>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>