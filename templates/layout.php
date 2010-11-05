<?php

use_helper('I18N');

$routes = $sf_context->getRouting()->getRoutes();

$module = $sf_request->getParameter('module');
$action = $sf_request->getParameter('action');

$area_class  = Doctrine_Inflector::urlize(sfInflector::tableize($module));
$area_class .= ' ' . $area_class .  '-'. Doctrine_Inflector::urlize(sfInflector::tableize($action));

$snippet_area = Doctrine_Inflector::urlize(sfInflector::tableize($module) . '-' . sfInflector::tableize($action));

?>
<!doctype html>

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <?php use_stylesheet('/rtUserPlugin/css/reset.css') ?>
  <?php use_stylesheet('/rtUserPlugin/css/core.css') ?>
  <?php use_stylesheet('/rtUserPlugin/css/main.css') ?>
  <?php use_stylesheet('/rtUserPlugin/css/media.css') ?>
  <?php use_stylesheet('/rtUserPlugin/css/handheld.css', '', array('media' => 'handheld')) ?>

  <?php use_javascript('/rtCorePlugin/vendor/jquery/js/jquery.min.js'); ?>
  <?php use_javascript('/rtUserPlugin/js/modernizr-1.6.min.js'); ?>
  <?php use_javascript('/rtUserPlugin/js/plugins.js'); ?>
  <?php use_javascript('/rtUserPlugin/js/script.js'); ?>

  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>

  <!--[if lt IE 7 ]>
    <script src="/rtUserPlugin/js/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->
  
  <?php echo auto_discovery_link_tag('rss', '@rt_blog_page_feed?format=rss') ?>

  <link rel="shortcut icon" href="/rtUserPlugin/img/favicon.ico">
  <link rel="apple-touch-icon" href="/rtUserPlugin/img/apple-touch-icon.png">
  
</head>

<body class="<?php echo $area_class ?>">

  <div id="rt-container">

    <div id="rt-header">
        <?php echo link_to(sfConfig::get('app_rt_title', ''), 'homepage') ?>
    </div> <!--! end of #rt-header -->

    <div id="rt-nav">
      <?php include_partial('rtSearch/form', array('form' => new rtSearchForm())) ?>
      <h2><?php echo __('Site Pages') ?></h2>
      <?php include_component('rtSitePage', 'navigation', array('options' => array('render_full' => false))) ?>
      <h2><?php echo link_to(__('Latest News'), 'rt_blog_page_index') ?></h2>
      <?php include_component('rtBlogPage', 'latest') ?>
    </div> <!--! end of #rt-nav -->

    <div id="rt-body">

        <!-- content heading -->
        <?php if(has_slot('rt-title')): ?>
        <h1><?php include_slot('rt-title');  ?></h1>
        <?php endif; ?>

        <!-- error or success message -->
        <?php include_partial('rtAdmin/flashes_public') ?>

        <!-- content body -->
        <?php echo $sf_content ?>
        
    </div> <!--! end of #rt-body -->

    <div id="rt-footer">
      <ul>
        <?php if($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to(__('account details'), 'rt_guard_account') ?></li>
        <li><?php echo link_to(__('sign out'), 'sf_guard_signout') ?></li>
        <?php else: ?>
        <li><?php echo link_to(__('sign in'), 'sf_guard_signin') ?></li>
        <?php endif; ?>
        <li><?php echo link_to(__('sitemap'), 'rt_sitemap') ?></li>
      </ul>
    </div> <!--! end of #rt-footer -->

  </div> <!--! end of #rt-container -->

  <!--rt-admin-holder-->

</body>
</html>