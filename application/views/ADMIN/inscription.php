<!DOCTYPE html>
<html>

	<head>
		<title> Inscription </title>
		<meta charset="utf-8">
		<?php 
			echo css('bootstrap.min'); 
			// echo css('Inscription'); 
			echo css('font-awesome'); 
			echo css('form'); 
			// echo css('formulaire_inscription'); 
		?>

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
		<meta name="viewport" content="width-device-width, initial-scale=1. shrink-to-fit=no">
		<link rel="icon" type="image/png" href="<?php echo img_url('logo.PNG') ?>" />
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

	<body class="templatemo-bg-image-1">
		<div class="container">
			
			<div class="row" style="margin-top:130px;">
				<form action="<?php echo site_url(array('Administration','AddClient')) ?>" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12">
							<h1 class="h" style="text-align:center; color:#BD655B;">INSCRIVEZ UN UTILISATEUR <input type = "button" value = "x" onclick = "history.go(-1)" style="background-color:red; color:white; font-size:20px;"> </h1><br><br>
							
						</div>
					</div><br>
						<?php 
						 	if (isset($_SESSION['message_save'])) { ?>
					 			<div style="color:red; font-weight:bold; text-align:center;">
					 				<?php echo ($_SESSION['message_save']);  ?> 
					 			</div>
					 		<?php session_destroy(); ?> 
					 	<?php } ?>

					<div class="col-md-6">

						<label for="Nom">Noms</label>
				        <div class="input-group has-feedback">
				        	<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
				         	<input  class="form-control inputt validity " type="text" name="nom" id="Nom" required="" placeholder="Votre Nom" minlength="4" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]++{3,20}" maxlength="50" title=" saisir votre nom sans caractere special">
	              			<span class="validity input-group-addon" style="background-color: none;"></span>
				        </div>

				        <label for="prenom">Prenoms</label>
				        <div class="input-group has-feedback">  
				          <span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
				          <input  class="form-control inputt validity " type="text" name="prenom" id="Prenom" required="" placeholder="Votre Prenom" minlength="4" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]++{3,20}" maxlength="50" title=" saisir votre nom sans caractere special">
	              			<span class="validity input-group-addon" style="background-color: none;"></span>  
				        </div>

				        <label for="Email">Email</label>
				        <div class="input-group has-feedback">  
				          <span Class="input-group-addon essai"><span class="glyphicon glyphicon-envelope"></span></span>
				          <input  class="form-control inputt validity" type="email" name="email" id="email" required="" placeholder="Example@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
	              			<span class="validity input-group-addon" style="background-color: none;"></span>  
				        </div>

				        <label for="Tel">Mot de passe</label>
				        <div class="input-group has-feedback">
							<span class="input-group-addon essai"> <span class="glyphicon glyphicon-lock"> </span> </span>
							<input class="form-control inputt" type="PassWord" name="password" id="Pswd" required="" minlength="5" title="Entrer un mot de passe d'au moins 5 caracteres">
	              			<span class="validity input-group-addon" style="background-color: none;"></span>  
				        </div>

				    </div>

				    <div class="col-md-6">

				    	<label for="Numéro de Téléphone">Numéro de Téléphone</label>
				    	<div class="input-group has-feedback">
							<span Class="input-group-addon essai"><span class="glyphicon glyphicon-phone"></span></span>
							<input  class="form-control inputt validity " type="text" name="telephone" id="telephone" required="" placeholder="Votre Numéro de Téléphone" minlength="4" pattern="[0-9]+" maxlength="50" title=" saisir votre Numéro de Téléphone sans caractere special">
	              			<span class="validity input-group-addon" style="background-color: none;"></span>  
				        </div>

				        <label>Telecharger votre photo de profil</label>
				        <div class="input-group has-feedback">
							<input class="form-control inpt7" type="file" name="profil" accept="image/*" onchange="loadFile(event)" required="" >
						</div><br>
						<div>
	                        <img id="pp" style="width: 100px; height: 100px;" />     
						</div><br>

						<div class="col-md-offset-5 col-md-3">
							<input class="form-control inpt4" type="hidden" name="notif" value="1">
							<input class="form-control inpt4" type="hidden" name="niveau" value="1">
							<button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color:#BD655Bj;" id="Send">Inscrire</button>
						</div>
				    </div>
				</form>
			</div>
		</div>
			<?php js('bootstrap.min'); ?>
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
				// console.log(Zone);
				console.log(formulaire);

			    // previsualisation image dans formulaire
					var loadFile = function(event) {
			    var profil = document.getElementById('pp');
			      profil.src = URL.createObjectURL(event.target.files[0]);
			    };


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
	</body>
</html>
