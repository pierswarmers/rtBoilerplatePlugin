<?php
//
// PHP library helpers to include, this will give you access to
// some convenient php functions like: rt_menu(), rt_blah()...
//
use_helper('I18N', 'rtTemplate');

//
// Some commonly used parameters as variables.
// This section can be removed if unused.
//
$routes        = $sf_context->getRouting()->getRoutes();    // Routes
$module        = $sf_request->getParameter('module');       // Modulename
$action        = $sf_request->getParameter('action');       // Actionname
$area_class    = Doctrine_Inflector::urlize(sfInflector::tableize($module));
$area_class   .= ' ' . $area_class .  '-'. Doctrine_Inflector::urlize(sfInflector::tableize($action));
$snippet_area  = Doctrine_Inflector::urlize(sfInflector::tableize($module) . '-' . sfInflector::tableize($action));
?>
<!doctype html>

<!------ Set identifier for Internet Explorer versions -->
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <!------ Add CSS Files -->
  <?php use_stylesheet('/rtUserPlugin/css/reset.css') ?>                                        <!-- // Remove browser styles -->
  <?php use_stylesheet('/rtUserPlugin/css/core.css') ?>                                         <!-- // Main RediType BoilerPlate styles -->
  <?php use_stylesheet('/rtUserPlugin/css/main.css') ?>                                         <!-- // !! Your stuff goes here !! -->
  <?php use_stylesheet('/rtUserPlugin/css/media.css') ?>                                        <!-- // Print, projector, screen, etc... -->
  <?php use_stylesheet('/rtUserPlugin/css/handheld.css', '', array('media' => 'handheld')) ?>   <!-- // Styles for media devices -->

  <!------ Add JavaScript Files -->
  <?php use_javascript('/rtCorePlugin/vendor/jquery/js/jquery.min.js'); ?>  <!-- // JQuery library -->
  <?php use_javascript('/rtUserPlugin/js/modernizr-1.6.min.js'); ?>         <!-- // Modernizr library -->
  <?php use_javascript('/rtUserPlugin/js/plugins.js'); ?>                   <!-- // Paste jQuery plugins here -->
  <?php use_javascript('/rtUserPlugin/js/script.js'); ?>                    <!-- // !! Your stuff goes here !! -->

  <!------ Include Meta Data, CSS and JavaScript tags -->
  <?php include_http_metas() ?>           <!-- // Include Http Meta Data -->
  <?php include_metas() ?>                <!-- // Include Meta Tags -->
  <?php include_title() ?>                <!-- // Include Title -->
  <?php include_stylesheets() ?>          <!-- // Render Style Tags -->
  <?php include_javascripts() ?>          <!-- // Render JavaScript Tags -->

  <!------ Include PNG corrections when Internet Explorer 7 or lower is used -->
  <!--[if lt IE 7 ]>
    <script src="/rtUserPlugin/js/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

  <!------ Feed Tag -->
  <?php echo auto_discovery_link_tag('rss', '@rt_blog_page_feed?format=rss') ?>

  <!------ Favicon -->
  <link rel="shortcut icon" href="/rtUserPlugin/img/favicon.ico">
  <link rel="apple-touch-icon" href="/rtUserPlugin/img/apple-touch-icon.png">
</head>

<body class="<?php echo $area_class ?> <?php echo $sf_user->hasCredential('show_admin_menu') ? 'is-admin' : ''; ?>">

  <div id="rt-container">

    <div id="rt-header">
        <?php echo link_to(sfConfig::get('app_rt_title', ''), 'homepage') ?>
    </div> <!--! end of #rt-header -->

    <div id="rt-nav">

      <!------ Search form -->
      <div class="rt-section rt-search-widget">
        <div class="rt-section-content">
          <?php echo rt_get_search_form() ?>
        </div>
      </div>
      
      <!------ Dynamically created site navigation -->
      <div class="rt-section rt-nav-widget">
        <div class="rt-section-header">
          <h2><?php echo __('Site Pages') ?></h2>
        </div>
        <div class="rt-section-content">
          <?php echo rt_get_nav_full() ?>
        </div>
      </div>

      <!------ Latest news section -->
      <div class="rt-section rt-blog-page-latest-widget">
        <div class="rt-section-header">
          <h2><?php echo link_to(__('Latest News'), 'rt_blog_page_index') ?></h2>
        </div>
        <div class="rt-section-content">
          <?php echo rt_get_blog_latest(); ?>
        </div>
      </div>

      <!------ Blog archive section -->
      <div class="rt-section rt-blog-page-archive-widget">
        <div class="rt-section-header">
          <h2><?php echo __('Blog Archive') ?></h2>
        </div>
        <div class="rt-section-content">
          <?php echo rt_get_blog_archive(); ?>
        </div>
      </div>
      
      <!------ Tag cloud section -->
      <div class="rt-section rt-tag-cloud-widget">
        <div class="rt-section-header">
          <h2><?php echo __('Tag Cloud') ?></h2>
        </div>
        <div class="rt-section-content">
          <?php echo rt_get_tag_cloud(); ?>
        </div>
      </div>
      
      <!------ Shop section -->
      <?php if($sf_context->getInstance()->getRouting()->hasRouteName('rt_shop_order_cart')): ?>
        
        <!------ Shop: Mini-cart section -->
        <?php use_helper('rtShopTemplate'); ?>
        <div class="rt-section rt-shop-mini-cart-widget">
          <div class="rt-section-header">
            <h2><?php echo __('Mini-Cart') ?></h2>
          </div>
          <div class="rt-section-content">
            <?php echo rt_shop_get_mini_cart() ?>
          </div>
        </div>
      
        <!------ Shop: Categories section -->
        <div class="rt-section rt-shop-categories-widget">
          <div class="rt-section-header">
            <h2><?php echo __('Shop Categories') ?></h2>
          </div>
          <div class="rt-section-content">
            <?php echo rt_shop_get_category_list() ?>
          </div>
        </div>
        
      <?php endif; ?>
     
    </div> <!-- end of #rt-nav -->

    <div id="rt-body">

        <!-- Content Heading. Shown if title is set -->
        <?php if(!sfConfig::get('app_rt_templates_headers_embedded', true) && has_slot('rt-title')): ?>
          <h1><?php include_slot('rt-title');  ?></h1>
        <?php endif; ?>

        <!-- Error or Success Messages -->
        <?php include_partial('rtAdmin/flashes_public') ?>

        <!-- Content Body -->
        <?php echo $sf_content ?>

    </div> <!-- End of #rt-body -->

    <div id="rt-footer">

      <!-- User sign in, sign out, user account details and sitemap link -->
      <ul>
        <?php if($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to(__('account details'), 'rt_guard_account') ?></li>
        <li><?php echo link_to(__('sign out'), 'sf_guard_signout') ?></li>
        <?php else: ?>
        <li><?php echo link_to(__('sign in'), 'sf_guard_signin') ?></li>
        <?php endif; ?>
        <li><?php echo link_to(__('sitemap'), 'rt_sitemap') ?></li>
      </ul>
      
    </div> <!-- End of #rt-footer -->

  </div> <!-- End of #rt-container -->

  <!-- RediType Toolbar Handler -->
  <!--rt-admin-holder-->

</body>
</html>