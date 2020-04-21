<?php
/**
 * Template Name: Agent Page
 * Template Post Type: page
 */
get_header();
$post_thumbnail_id = get_post_thumbnail_id(get_the_id());
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
while ( have_posts() ) : the_post(); ?>
    <div class="r-overlay"></div>
  <main id="flex-default-theme">
      <div class="gwr grand-breadcrumb">
          <nav class="flex-breadcrumb" aria-label="breadcrumb">
              <ol>
                  <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                  <li aria-current="page"><?php echo get_the_title(); ?></li>
              </ol>
          </nav>
      </div>
      <article class="flex-block-description agent-header">
        <!-- TITULO PAGINA -->
<!--        <div class="title-area">-->
<!--          <h1>--><?// echo get_the_title(); ?><!--</h1>-->
<!--        </div>-->
        <!-- TITULO PAGINA -->
        <!-- CONTENIDO -->
        <?php the_content(); ?>

<!--        <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/arrow-down.png" width="46" height="44" alt="">-->
        <!-- CONTENIDO -->
      </article>
      <!-- IMAGEN POR DEFECTO -->
      <?php if ($post_thumbnail_url) { ?>
        <div class="content-full-img"><img src="<?php echo $post_thumbnail_url;?>" title="About" alt="About"></div>
      <?php } ?>
  
    <?php echo do_shortcode('[agents_dgt category="agents" format="grid"]');?>

  </main>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/agents.css">
<?php endwhile; get_footer(); ?> 
