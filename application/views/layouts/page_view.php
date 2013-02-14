<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Welcome to Infinity</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
    <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
</head>

<body>

  <!--[if lt IE 7]>
  <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

  <div class="container-fluid">

      <div class="row-fluid" id="header-region-container"></div>

      <div class="row-fluid" id="content-region-container">
          <?php
          if (isset($view['layout']) && !isset($view['data'])) {
            $this->load->view($view['layout']);
          } elseif (isset($view['layout']) && is_array($view['data'])) {
            $this->load->view($view['layout'], $view['data']);
          } else {
            show_error('View file not defined. You cannot access a page without a view');
          }
          ?>
      </div>

      <div class="row-fluid" id="footer-region-container"></div>

  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
  <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/vendor/plugins.js"></script>

</body>

</html>