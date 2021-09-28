<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Community Manager | LEWAT HOTEL </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo admin_bt_css("css/bootstrap.min"); ?>
  <!-- Theme style -->
  <?php echo admin_dist_css("css/AdminLTE.min"); ?>
  <?php echo admin_dist_css("css/skins/_all-skins.min"); ?>
  <!-- iCheck -->
  <?php echo admin_plugins_css("iCheck/flat/blue"); ?>
  <!-- Morris chart -->
  <?php echo admin_plugins_css("morris/morris"); ?>
  <!-- jvectormap -->
  <?php echo admin_plugins_css("jvectormap/jquery-jvectormap-1.2.2"); ?>
  <!-- Date Picker -->
  <?php echo admin_plugins_css("datepicker/datepicker3"); ?>
  <!-- Daterange picker -->
  <?php echo admin_plugins_css("daterangepicker/daterangepicker"); ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <?php echo admin_plugins_css("bootstrap-wysihtml5/bootstrap3-wysihtml5.min"); ?>
  <?php echo css('app/admin_style'); ?>
  <?php 
    echo js('app/jquery.min');
    
    
   ?>
 


  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <link rel="icon" type="image/png" href="<?php echo img_url('logo.PNG') ?>" />
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo site_url(array('Welcome','index')); ?>">Community Manager LEWAT HOTEL</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Connectez vous pour démarrer votre session</p>
      <p style="color: red;"><?php if (isset($_SESSION['ERR'])) { echo $_SESSION['ERR'];} ?></p>

      <form action="<?php echo site_url(array('Community_Manager','manageConnexion')) ?>" method="post">
        <div class="form-group has-feedback">
        
          <input type="email" class="form-control" placeholder="Votre email" name="email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      
        </div>
        <div class="form-group has-feedback">
          
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          
        </div>
        <div class="row">
          
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Se Connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-box-body -->
  </div>

</body>
</html>
