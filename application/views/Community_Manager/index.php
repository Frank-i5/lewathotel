<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    Welcome  
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  
  <?php echo admin_bt_css("css/bootstrap.min"); ?>
  <?php echo admin_dist_css("css/AdminLTE.min"); ?>
  <?php echo admin_dist_css("css/skins/_all-skins.min"); ?>
  <?php echo admin_plugins_css("morris/morris"); ?>
  <?php echo admin_plugins_css("jvectormap/jquery-jvectormap-1.2.2"); ?>
  <?php echo admin_plugins_css("datepicker/datepicker3"); ?>
  <?php echo admin_plugins_css("daterangepicker/daterangepicker"); ?>
  <?php echo admin_plugins_css("bootstrap-wysihtml5/bootstrap3-wysihtml5.min"); ?>
  <script  type=" text/javascript" src="<?php echo base_url().'assets/javascript/jquery-3.6.0.min.js' ?>"></script>

  <?php 
    echo css('app/admin_style'); 
    echo css('app/style'); 
    echo css('font-awesome');
    echo css('ionicons.min'); 
    echo css('bootstrap.min');
    echo css('icon-font.min');
    echo css('table-style');
    echo css('dataTables.bootstrap.min');
    echo css('jquery.dataTables.min');
    echo css('monstyle');
    echo css('forum-style');
  ?>
  
  
   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <link rel="icon" type="image/png" href="<?php echo img_url('LEWAT.JPEG') ?>" />
</head>
<body class="hold-transition skin-blue sidebar-mini"> 
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo site_url(array('Community_Manager','index')) ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>I</b>C</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LEWAT HOTEL</b> </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Zapper Navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">dix</font></font></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vous avez 10 notifications</font></font></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- <li>
                    <a href="<?php echo site_url(array('Administration','notif_categorie')) ?>">
                      <i class="fa fa-users text-red"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    </font></font></a>
                  </li> -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if (isset($_SESSION['Community_Manager'])) {?>
                  <?php echo imgProfil($_SESSION['Community_Manager']['profil'], 'user-image','user-image','user-image'); ?>
                <?php }  ?>
                <?php if (isset($_SESSION['Community_Manager'])) {?>
                  <span class="hidden-xs"><?php echo $_SESSION['Community_Manager']['nom'] ?></span>
                  <span class="hidden-xs"><?php echo $_SESSION['Community_Manager']['prenom'] ?></span>
                <?php } ?>

              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <?php if (isset($_SESSION['Community_Manager'])) {?>
                  <?php echo imgProfil($_SESSION['Community_Manager']['profil'], 'user-image','user-image','user-image'); ?>
                <?php }  ?>

                
                <?php if (isset($_SESSION['Community_Manager'])) {?>                  
                    <p>
                      <?php echo $_SESSION['Community_Manager']['nom']?>
                      <?php echo $_SESSION['Community_Manager']['prenom'] ?>
                    </p>
                <?php } ?>


                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <?php if (isset($_SESSION['Community_Manager'])) {?>
                      <a href="<?php echo site_url(array('Community_Manager','voirprofil')) ?>" class="btn btn-default btn-flat">Profil</a>
                    <?php } ?>
                  </div>
                  <div class="pull-right">
                    <?php if (isset($_SESSION['Community_Manager'])) {?>
                        <a href="<?php echo site_url(array('Community_Manager','deconnexion')) ?>" class="btn btn-default btn-flat">Deconnexion</a>
                    <?php } ?>
                  </div>
                </li>
              </ul>
            </li>
        </div>
      </nav>
    </header>



