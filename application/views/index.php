<!DOCTYPE html>
<html lang="en">
  <head>
<!--    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    -->
    <title>Title | Home</title>

        

   <?php
      $meta = array(
            array('name' => 'description',
                'content' => 'Home'  
            ),
            array( 'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no'
            )

          );
      echo meta($meta);
  $bootstrap = array(
                'href' => 'assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $fontawsome = array(
                'href' => 'assets/bower_components/font-awesome/css/font-awesome.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $googlefont1 = array(
                'href' => 'https://fonts.googleapis.com/css?family=Montserrat:400,700',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $googlefont2 = array(
                'href' => 'https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );


  ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url('assets/img/favicon.ico');?>" type="image/x-icon">

    <!-- Font awesome -->
    <link href="<?=base_url('assets/css/font-awesome.css');?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?=base_url('assets/css/bootstrap.css');?>" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/slick.css'); ?>">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.fancybox.css');?>" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="<?=base_url('assets/css/theme-color/default-theme.css');?>" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
    <!-- Google Fonts -->
    <!-- Google Font -->
  <?=link_tag($googlefont1)?>
  <?=link_tag($googlefont2)?>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <?php $this->view('front-top'); ?>
  <!-- End header  -->
  <!-- Start menu -->
  <?php $this->view('front-menu'); ?>
  <!-- End menu -->
  <!-- Start search box -->
    <?php $this->view('front-search'); ?>
  <!-- End search box -->
  <!-- Start Slider -->
  <?php $this->view('front-slider'); ?>
  <!-- End Slider -->
  <!-- Start service  -->
  <?php $this->view('front-content'); ?>

  <!-- Start footer -->
<?php $this->view('front-footer'); ?>

  </body>
</html>