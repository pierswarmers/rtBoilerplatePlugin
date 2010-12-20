<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>
<!doctype html>

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/rtUserPlugin/css/reset.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/rtUserPlugin/css/core.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/rtUserPlugin/css/main.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/rtUserPlugin/css/media.css" />
  <link rel="stylesheet" type="text/css" media="media" href="<?php echo $path ?>/rtUserPlugin/css/handheld.css" />

  <link rel="shortcut icon" href="/rtUserPlugin/img/favicon.ico" />
  <link rel="apple-touch-icon" href="/rtUserPlugin/img/apple-touch-icon.png" />

</head>
<body>
<div class="rt-message-container rt-message-type-error">
  <div>
    <h1>Oops! An Error Occurred</h1>
    <h5>The server returned a "<?php echo $code ?> <?php echo $text ?>".</h5>
  </div>

  <dl>
    <dt>Something is broken</dt>
    <dd>Please e-mail us at <?php echo sfConfig::get('app_rt_admin_email') ?> and let us know what you were doing when this error occurred. We will fix it as soon as possible.
    Sorry for any inconvenience caused.</dd>

    <dt>What's next</dt>
    <dd>
      <ul>
        <li><a href="javascript:history.go(-1)">Back to previous page</a></li>
        <li><a href="/">Go to Homepage</a></li>
      </ul>
    </dd>
  </dl>
</div>
</body>
</html>