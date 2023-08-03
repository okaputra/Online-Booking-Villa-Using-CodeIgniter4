<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <?php if(session('islogin')==true) : ?>
      <title>Relax in Bali | PROPERTIES</title>
    <?php else : ?>
      <title>Relax in Bali</title>
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/favicon.ico" type="image/x-icon">

    

    <!-- Font awesome -->
    <link href="<?= base_url(); ?>/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>/css/bootstrap.css" rel="stylesheet">   
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/css/nouislider.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="<?= base_url(); ?>/css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="<?= base_url(); ?>/css/style.css" rel="stylesheet">    

   
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="aa-price-range">  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="pulse"></div>
  </div>
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="aa-header">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-area">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-left">
                  <div class="aa-telephone-no">
                    <!-- <span class="fa fa-phone"></span> -->
                    <!-- 1-900-523-3564 -->
                  </div>
                  <div class="aa-email hidden-xs">
                    <!-- <span class="fa fa-envelope-o"></span> info@markups.com -->
                  </div>
                </div>              
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-right">
                  <?php if(session('islogin')==true) : ?>
                    <a href="/dashboard" class="aa-register">Hi, <?= session('name') ?></a>
                    <a href="/logout-end" class="aa-register">Logout</a>
                  <?php else : ?>
                    <a href="/register" class="aa-register">Register</a>
                    <a href="/login-section" class="aa-login">Login</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header section -->

  <?= $this->include('layout/script-alert'); ?>

  <!-- Start menu section -->
  <section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
          <!-- Text based logo -->
           <!-- <a class="navbar-brand aa-logo" href="/"> Relax <span>in Bali</span></a> -->
           <!-- <a class="navbar-brand aa-logo" href="/"> Relax <span>in Bali</span></a> -->
           <!-- Image based logo -->
           <a class="navbar-brand aa-logo-img" href="/"><img src="/img/logo.jpg" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li class="active" style="padding-right: 5px"><a href="/dashboard">HOME</a></li>
            <li class="active" style="padding-right: 5px"><a href="/users-list-villa" style="color:black;">PROPERTIES</a></li>      
            <li class="active" style="padding-right: 5px"><a href="contact.html">CONTACT</a></li>
            <li class="active" style="padding-right: 5px"><a href="/checklist">MY BOOKING</a></li>
            <?php if(session('islogin')==true) : ?>
              <li class="active" style="padding-right: 5px"><a href="/update-profile/<?= session('id') ?>">UPDATE PROFILE</a></li>
            <?php else : ?>

            <?php endif; ?>
           <!-- <li><a href="404.html">404 PAGE</a></li> -->
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>
  <!-- End menu section -->

  <?= $this->renderSection('content'); ?>


  <!-- Footer -->
  <footer id="aa-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-footer-area">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-left">
               <p>Designed by <a rel="nofollow" href="http://www.markups.io/">Wulandari</a></p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-middle">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="aa-footer-right">
                <a href="#">Home</a>
                <a href="#">Support</a>
                <a href="#">License</a>
                <a href="#">FAQ</a>
                <a href="/login-section-admin">Administrator</a>
              </div>
            </div>            
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

 
  
  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script src="<?= base_url(); ?>/js/jquery.min.js"></script>   
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url(); ?>/js/bootstrap.js"></script>   
  <!-- slick slider -->
  <script type="text/javascript" src="<?= base_url(); ?>/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="<?= base_url(); ?>/js/nouislider.js"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="<?= base_url(); ?>/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="<?= base_url(); ?>/js/jquery.fancybox.pack.js"></script>
  <!-- Custom js -->
  <script src="<?= base_url(); ?>/js/custom.js"></script> 

  </body>
</html>