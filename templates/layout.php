<?php

use_helper('I18N');

$routes = $sf_context->getRouting()->getRoutes();

?>
<!doctype html>
<html lang="en" class="no-js">
  <head>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"><![endif]-->

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php use_stylesheet('http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz') ?>
    <?php use_stylesheet('/rtUserPlugin/css/style.css') ?>
    <?php use_stylesheet('/rtUserPlugin/css/handheld.css', '', array('media' => 'handheld')) ?>
    <?php include_stylesheets() ?>
    <?php use_javascript('/rtCorePlugin/vendor/jquery/js/jquery.min.js'); ?>
    <?php use_javascript('/rtUserPlugin/js/plugins.js'); ?>
    <?php use_javascript('/rtUserPlugin/js/script.js'); ?>

    <?php include_javascripts() ?>

    <!--[if lt IE 7 ]>
      <script src="/rtUserPlugin/js/dd_belatedpng.js"></script>
    <![endif]-->

    <?php if (isset($routes['rt_blog_page_feed'])): ?>
    <?php echo auto_discovery_link_tag('rss', '@rt_blog_page_feed?format=rss') ?>
    <?php echo auto_discovery_link_tag('atom', '@rt_blog_page_feed?format=atom') ?>
    <?php endif; ?>

    <script>
      (function(){var d = document, e = d.documentElement, s = d.createElement('style');if (e.style.MozTransform === ''){s.textContent = 'body{visibility:hidden}';e.firstChild.appendChild(s);function f(){ s.parentNode && s.parentNode.removeChild(s); }addEventListener('load',f,false);setTimeout(f,3000);}})();
      (function(B,C){B[C]=B[C].replace(/\bno-js\b/,'js');if(!/*@cc_on!@*/0)return;var e = "abbr article aside audio canvas command datalist details figure figcaption footer header hgroup mark meter nav output progress section summary time video".split(' '),i=e.length;while(i--){document.createElement(e[i])}})(document.documentElement,'className');
    </script>

  </head>

  <!--[if lt IE 7 ]> <body class="ie6"> <![endif]-->
  <!--[if IE 7 ]>    <body class="ie7"> <![endif]-->
  <!--[if IE 8 ]>    <body class="ie8"> <![endif]-->
  <!--[if IE 9 ]>    <body class="ie9"> <![endif]-->
  <!--[if gt IE 9]>  <body>             <![endif]-->
  <!--[if !IE]><!--> <body>         <!--<![endif]-->

    <div id="rt-container">

      <div id="rt-header">
          <?php echo link_to(sfConfig::get('app_rt_title', ''), 'homepage') ?>
      </div>

      <div id="rt-nav">
        <?php include_partial('rtSearch/form', array('form' => new rtSearchForm())) ?>
        <h2><?php echo __('Site Pages') ?></h2>
        <?php include_component('rtSitePage', 'navigation', array('options' => array('render_full' => false))) ?>
        <h2><?php echo link_to(__('Latest News'), 'rt_blog_page_index') ?></h2>
        <?php include_component('rtBlogPage', 'latest') ?>
        <h2><?php echo __('Archive') ?></h2>
        <?php include_component('rtBlogPage', 'archive') ?>
        <h2><?php echo __('Tag Cloud') ?></h2>
        <?php include_component('rtTag', 'cloud', array('options' => array('limit' => 20))) ?>
        <?php if (isset($routes['rt_shop_order_cart'])): ?>
        <h2><?php echo __('Your Shopping Cart') ?></h2>
        <?php include_partial('rtShopOrder/cart_mini') ?>
        <?php endif; ?>
        <?php if (isset($routes['rt_shop_category_index'])): ?>
        <h2><?php echo __('Shop Categories') ?></h2>
        <?php include_component('rtShopCategory', 'navigation') ?>
        <?php endif; ?>
      </div>

      <div id="rt-body">
          <?php include_partial('rtAdmin/flashes_public') ?>
          <?php echo $sf_content ?>
      </div>

      <div id="rt-footer">
        <ul>
          <?php if (!$sf_user->isAuthenticated()): ?>
          <li><?php echo link_to(__('sign in'), '@sf_guard_signin') ?></li>
          <?php else: ?>
          <li><?php echo link_to(__('sign out'), '@sf_guard_signout') ?></li>
          <?php endif; ?>
          <li><?php echo link_to(__('sitemap'), 'rt_sitemap') ?></li>
        </ul>
      </div>

    </div>

    <!--rt-admin-holder-->
  </body>
</html>