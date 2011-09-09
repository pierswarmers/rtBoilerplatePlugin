<?php

$code  = isset($code) ? $code : '500';
$text  = isset($text) ? $text : 'The server is currently unavailable because something is broken';
$email = class_exists('sfConfig') ? sfConfig::get('app_rt_admin_email', false) : false;

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Oops! An Error Occurred</title>
  <style>
    html { font-size: 100%; overflow-y: scroll; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    body { margin: 0; padding: 20px; font-family: sans-serif; color: #555; font-size: 12px; }
    #content { padding-top: 60px; background: url(/rtUserPlugin/img/logo-large.png) no-repeat; }
    #content div { padding: 20px; margin-top: 20px; background: #EFEFEF; border: 1px solid #CCC; border-bottom: 2px solid #CCC; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; }
    h1 { font-size: 18px }
    a, a:visited { color: #3366CC;  }
  </style>
</head>
<body>
<div id="content">
  <div>
    <h1>Oops! An Error Occurred</h1>
    <p>The server returned a "<?php echo $code ?> - <?php echo $text ?>".</p>
    <?php if($email): ?>
    <p>Please e-mail us at <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a> and let us know what you were doing when this error occurred.</p>
    <?php endif; ?>
    <p>We will fix it as soon as possible so be sure to check back again shortly.</p>
    <p>You can <a href="javascript:history.go(-1)">go back to the previous page</a> or <a href="/">jump to our Homepage</a>.</p>
  </div>
</div>
</body>
</html>