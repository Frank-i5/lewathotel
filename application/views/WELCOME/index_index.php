

<!DOCTYPE HTML>
<html>
<head>
<title>Lewat Hotel</title>	
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mr Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!--google fonts-->
<!-- animated-css -->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	 <?php  
      echo css('css/bootstrap');
      echo css('bootstrap.min');
      echo css('fonts/glyphicons-halflings-regular');
      echo css('fonts/glyphicons-halflings-regular');
      echo css('font-awesome.min');
      echo css('css/style');
      echo css('css/style1');
      echo css('css/style2');
      // echo css('css/style4');
      echo css('css/form');
      echo css('css/animate');
      echo css('css/chocolat');
    ?>
		<style>
			input:invalid+span:after {
			  content: '*';
			  color: red;
			  padding-left: 5px;

			}

			input:valid+span:after {
			  content: '✓';
			  color: green;
			  padding-left: 5px;
			  font-weight: bolder;
			}

			.error
				{
					color: #FF0000;	
				}
		</style>


</head>
<body>
<!--header-top start here-->
<div class="top-header" >
	<nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <div class="col-md-4 col-sm-4 col-xs-4 top-social wow bounceInLeft" data-wow-delay="0.3s" style="margin-top: -8px; ">
			    <ul>
			    	<li><h5>Rejoignez Lewat Hotel :</h5></li>
			    	<li><a href="#"><span class="fa fa-facebook" style="color:#362D30; font-size:20px;"> </span></a></li>
			    	<li><a href="https://api.whatsapp.com/send/?phone=237651717926&text&app_absent=0"><span class="fa fa-whatsapp" style="color:#362D30; font-size:20px;"> </span></a></li>
			    	<li><a href="#"><span class="fa fa-linkedin" style="color:#362D30; font-size:20px;"> </span></a></li>
			    </ul>
			</div>
            
            <!-- <div class="collapse navbar-collapse" id="navi"> -->
                <ul class="navbar-nav mr-auto">
                    
                    
                    <?php
                    //set navigation bar when logged in
                    if(isset($_SESSION['id_user'])){ echo'
                    <li class="nav-item">
                        <a class="nav-link" href="reservation1.php" >New Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_reservations.php" >View Reservations</a>
                    </li>';
                    
                    //set navigation bar when logged in and role of admin
                    if($_SESSION['niveau']==3) {   
                    echo'
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php" >Edit Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tables.php" >Edit Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_tables.php" >View Tables</a>
                    </li>';    
                    }
                    }
                    //main page not logged in navigation bar
                    
                    ?>
                    
                </ul>
                
                    <?php
                    //log out button when user is logged in
                    if(isset($_SESSION['id_user'])){
                    echo '
                    <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark">Logout</button>
                    </form>';
                    }
                    else{  
                    echo '
                    <div>
                    <ul class="navbar-nav ml-auto">
						<a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_reg">&nbsp;Sing Up</a>&nbsp &nbsp &nbsp &nbsp
						<a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Login</a>
                    </ul> 
                    </div>
                    ';} 
                    ?>
              
            <!-- </div> -->
        </div>
	</nav>

	<div class="container">
	  <!-- The Modal -->                          
	    <div class="modal fade" id="myModal_login">
	        <div class="modal-dialog">
	          <div class="modal-content">

	            <!-- Modal Header -->
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" style="background-color: red">&times;</button>
	            </div>

	            <!-- Modal body -->
	            <div class="modal-body">
	            
	            <?php
	            if(isset($_GET['error1'])){
	        
	            //script for modal to appear when error 
	            echo '  <script>
	                    $(document).ready(function(){
	                    $("#myModal_login").modal("show");
	                    });
	                    </script> ';
	        
	        
	            //error handling of log in
	        
	            if($_GET['error1'] == "emptyfields") {   
	            echo '<h5 class="text-danger text-center">Fill all fields, Please try again!</h5>';
	            }
	            else if($_GET['error1'] == "error") {   
	            echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
	            }
	            else if($_GET['error1'] == "wrongpwd") {   
	                echo '<h5 class="text-danger text-center">Wrong Password, Please try again!</h5>';
	            }
	            else if($_GET['error1'] == "error2") {   
	                echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
	            }
	            else if($_GET['error1'] == "nouser") {   
	                echo '<h5 class="text-danger text-center">Username or email not found, Please try again!</h5>';
	                }
	            }
	            echo'<br>';
	            ?>  
	            
	                <div class="signin-form">
	                	<h3 style="color:#BD655B;">CONNECTEZ VOUS</h3>
						<p style="text-align:center; color:black;">C'est gratuit et ça le restera toujours!!</p>
	                	<h4 class="text-center">
							<?php 
							 	if (isset($_SESSION['message_save'])) { ?>
						 			<div style="color:red; font-weight:bold; text-align:center;">
						 				<?php echo ($_SESSION['message_save']);  ?> 
						 			</div>
						 		<?php session_destroy(); ?> 
						 	<?php } ?>
                		</h4>
	                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url(array('Client','manageConnexion')) ?>" id="myform" class="formulaire" enctype="      multipart/form-data">
	                    <!-- <p class="hint-text">If you have already an account please log in.</p> -->

		                    <span class="glyphicon glyphicon-envelope"></span>
							<label>Email</label>
							<div class="input-group">
								<input class="form-control inpt3" type="email" name="email" placeholder="veuillez entrer votre adresse mail" id="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
								<span class="validity input-group-addon" style="background-color: none;"></span>
								<p></p>
							</div><br>

		                    <span class="glyphicon glyphicon-lock"></span>
							<label>Mot de passe</label>
							<div class="input-group">
								<input class="form-control inpt4" type="password" name="password" placeholder="Veuillez entrer votre mot de passe" id="Pswd"  required="" minlength="5">
								<span class="validity input-group-addon" style="background-color: none;"></span>
							</div>

		                    <div class="row room-btn" style="text-align:center; margin:20px;">
							<input class="form-control inpt4" type="hidden" name="notif" value="1">
							<input class="form-control inpt4" type="hidden" name="niveau" value="1">
							<input  type="reset" name="Annuler" class="btn btn-info hvr-push" style="margin:20px;">
							<input  type="submit" name="Enregistrer"  class="btn btn-info btn-success" style="margin:20px;" id="Send">
							</div>
	                    </form>
	                </div>   
	                </div>
	                <!-- Modal footer -->
	                <div class="modal-footer">
	                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                </div>
	            </div>
	        </div>
	    </div> 
	</div>

	<div class="container">
	  <!-- The Modal -->
	    <div class="modal fade" id="myModal_reg">
	        <div class="modal-dialog">
	            <div class="modal-content">
	            <!-- Modal Header -->
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                </div>      
	            <!-- Modal body -->
	                <div class="modal-body">   

	                <?php
	                if(isset($_GET['error'])){
	                    //script for modal to appear when error 
	                    echo '  <script>
	                                $(document).ready(function(){
	                                $("#myModal_reg").modal("show");
	                                });
	                            </script> ';


	                    //error handling for errors and success --sign up form

	                    if($_GET['error'] == "emptyfields") {   
	                        echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "invalidemailusername") {   
	                        echo '<h5 class="bg-danger text-center">Username or Email are taken!</h5>';
	                    }
	                    else if($_GET['error'] == "invalidemail") {   
	                        echo '<h5 class="bg-danger text-center">Invalid Email, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "usernameemailtaken") {   
	                        echo '<h5 class="bg-danger text-center">Username or email is taken, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "invalidusername") {   
	                        echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "invalidpassword") {   
	                        echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "passworddontmatch") {   
	                        echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
	                    }
	                    else if($_GET['error'] == "error1") {   
	                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
	                    }
	                    else if($_GET['error'] == "error2") {   
	                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
	                    }
	                }
	                if(isset($_GET['signup'])) { 
	                        //script for modal to appear when success
	                    echo '  <script>
	                                $(document).ready(function(){
	                                $("#myModal_reg").modal("show");
	                                });
	                            </script> ';

	                    if($_GET['signup'] == "success"){ 
	                        echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
	                    }
	                }
	                echo'<br>';
	                ?>
	    
	    <!---sign up form -->
	                    <div class="signup-form">
	                    	<h3 style="color:#BD655B;">INSCRIVEZ VOUS</h3>
							<p style="text-align:center; color:black;">C'est gratuit et ça le restera toujours!!</p>
			                <h4 class="text-center">
									<?php 
									 	if (isset($_SESSION['message_save'])) { ?>
								 			<div style="color:red; font-weight:bold; text-align:center;">
								 				<?php echo ($_SESSION['message_save']);  ?> 
								 			</div>
								 		<?php session_destroy(); ?> 
								 	<?php } ?>
			                </h4>
	                        <form enctype="multipart/form-data" method="post" action="<?php echo site_url(array('Client','AddClient')) ?>" id="myform" class="formulaire" enctype="    multipart/form-data">
	                            
	                            <span class="glyphicon glyphicon-user"></span>
								<label>Noms</label>
								<div class="input-group">
									<input id="Nom" class=" form-control inpt1 " type="text" name="nom" placeholder="veuillez entrer votre nom"  required="" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]++{3,20}">
									<span class="validity input-group-addon" style="background-color: none;"></span>
									<p></p>
								</div>

		                        <span class="glyphicon glyphicon-user"></span>
								<label>Prenoms</label>
								<div class="input-group">
									<input class="form-control inpt2" type="text" name="prenom" placeholder="veuillez entrer votre nom"  id="Prenom" required="" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]++{3,20}">
									<span class="validity input-group-addon" style="background-color: none;"></span>
									<p></p>
								</div>

	                            <span class="glyphicon glyphicon-envelope"></span>
								<label>Email</label>
								<div class="input-group">
									<input class="form-control inpt3" type="email" name="email" placeholder="veuillez entrer votre adresse mail" id="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
									<span class="validity input-group-addon" style="background-color: none;"></span>
									<p></p>
								</div>

	                            <span class="glyphicon glyphicon-lock"></span>
								<label>Mot de passe</label>
								<div class="input-group">
									<input class="form-control inpt4" type="password" name="password" placeholder="Veuillez entrer votre mot de passe" id="Pswd"  required="" minlength="5">
									<span class="validity input-group-addon" style="background-color: none;"></span>
								</div>

								<span class="glyphicon glyphicon-phone"></span>
								<label>Téléphone</label>
								<div class="input-group">
									<input  class="form-control inputt validity " type="text" name="telephone" id="telephone" required="" placeholder="Votre Numéro de Téléphone" minlength="4" pattern="[0-9]+" maxlength="50" title=" saisir votre Numéro de Téléphone sans caractere special">
									<span class="validity input-group-addon" style="background-color: none;"></span>
									<p></p>
								</div>

								<span class="glyphicon glyphicon-picture"></span>
								<label>Telecharger votre photo de pofil</label>
								<div class="input-group">
									<input class="form-control inpt7" type="file" name="profil" accept="image/*" onchange="loadFile(event)" required="" >
									<span class="validity input-group-addon" style="background-color: none;"></span>
								</div>
								<div class="col-md-offset-4 col-md-4 im" style="">
		                        	<img id="im"/>
		                  		</div>

	                            <div class="form-group">
	                                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
	                            </div>
	                            <!-- <div class="form-group">
	                                <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">Register Now</button>
	                            </div> -->
	                            <div class="row room-btn" style="text-align:center; margin:20px;">
									<input class="form-control inpt4" type="hidden" name="notif" value="1">
									<input class="form-control inpt4" type="hidden" name="niveau" value="1">
									<input  type="reset" name="Annuler" class="btn btn-info hvr-push" style="margin:20px;">
									<input  type="submit" name="Enregistrer"  class="btn btn-info btn-success" style="margin:20px;" id="Send"> 
								</div>
	                        </form>
	                            <div class="text-center">Already have an account? <a href="#">Sign in</a></div>
	                    </div> 	
	                </div>        
	                <!-- Modal footer -->
	                <div class="modal-footer">

	                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                </div> 
	            </div>
	        </div>
	    </div>
	</div>

</div>
<!--header-top end here-->
<!--header start here-->
	<!-- NAVBAR
		================================================== -->
<div class="header">
	<div class="fixed-header home">	

		    <div class="navbar-wrapper">
		      <div class="container">
		        <nav class="navbar navbar-inverse navbar-static-top">
		             <div class="navbar-header">
			              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			              </button>
			              <div class="logo wow slideInLeft" data-wow-delay="0.3s">
				            <a  href="" class="  navbar-brand">
				              <div class="col-md-3 logo" style="font-style:bold;">
				                <!-- <img src="logo4.png" class="logo1" style="width:80%;"> -->
				                <?php echo img('lewat.png','', 'lewat'); ?>
				              </div>
				            </a>
			              </div>
			          </div>
		            <div id="navbar" class="navbar-collapse collapse pull pull-right">
		            <nav class="cl-effect-16" id="cl-effect-16">
		              <ul class="nav navbar-nav">
		               <li><a class="active" href="<?php echo site_url(array('Welcome','index'))?>" data-hover="ACCEUIL">ACCEUIL</a>
		               </li>
		                <li class="dropdown active"><a class="nav-color" data-toggle="dropdown"  href="about.html" data-hover="HEBERGEMENT">HEBERGEMENT</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url(array('Welcome','Suite_Junior'))?>">SUITES JUNIORS</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url(array('Welcome','Twins'))?>">TWINS</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url(array('Welcome','Chambre_Standard'))?>">CHAMBRES STANDARDS</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url(array('Welcome','Chambre_Standard'))?>">CHAMBRES DE LUXES</a></li>
							</ul>
		                </li>
						<li class="dropdown"><a class="nav-color" data-toggle="dropdown" href="" data-hover="RESTAURATION">RESTAURATION</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url(array('Welcome','Petit_Dejeuner'))?>">PETIT DEJEUNER</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url(array('Welcome','Buffet'))?>">BUFFET DU CHEF</a></li>
							</ul>
						</li>
						<li class="dropdown"><a class="nav-color" data-toggle="dropdown" href="" data-hover="EVENEMENT">EVENEMENT</a>
							<ul class="dropdown-menu">
								<li><a href="">SALLES DE CONFERENCES</a></li>
								<li class="divider"></li>
								<li><a href="">BANQUETS</a></li>
								
							</ul>
						</li>
						<li class="dropdown"><a class="nav-color" data-toggle="dropdown" href="" data-hover="BAR">BAR</a>
							
						</li>
						<li class="dropdown"><a class="nav-color" data-toggle="dropdown" href="" data-hover="CAVE">CAVE</a>
							
						<li><a href="<?php echo site_url(array('Welcome','Contact')) ?>" data-hover="CONTACT">CONTACT</a></li>						
		              </ul>
		            </nav>

		            </div>
		            <div class="clearfix"> </div>
		             </nav>
		          </div>
		           <div class="clearfix"> </div>
		    </div>
	 </div>
<!--header end here-->
</div>
	<script>    
        var loadFile = function(event) {
            var profil = document.getElementById('im');
            profil.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
            <script type="text/javascript">
                var cpt = 0;
                var Message_erreur = document.getElementsByClassName('al');
                var Etoile_erreur = document.getElementsByTagName('sup');
                var Valid = document.getElementsByClassName('Valid');
                var Send = document.getElementById('Send');
                var Zone = document.getElementsByTagName('input');
                var pays = document.getElementById('Nationalite');
                var formulaire = document.getElementsByTagName('form');
                var Clear = document.getElementById('Clear');


                    // Masquage Message erreur
                    function Masque() { 
                        for (var i = Message_erreur.length - 1; i >= 0; i--) {
                          Message_erreur[i].style.opacity = '0';
                        }

                        for (var i = Etoile_erreur.length - 1; i >= 0; i--) {
                            Etoile_erreur[i].style.opacity = '0';
                        }

                        for (var i = Valid.length - 1; i >= 0; i--) {
                            Valid[i].style.opacity = '0';
                        }

                    }
                    Masque();
            </script>
            <script type="text/javascript">

            // Fonction  désactivation de affichage  « Message  erreur »
                var Error = document.getElementsByClassName('Erreur');
                // var Photo = document.getElementById('Bloc_Photo');
                  var Nom = document.getElementById('Nom');

                function desactive() {
                  for (var i = 0 ; i < Error.length ; i++) {
                      Error[i].style.display = 'none';
                  }
                  // Photo.style.display = 'none';
                }
                desactive();
            </script>