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
		<meta name="viewport" content="width-device-width, initial-scale=1. shrink-to-fit=no">
		<link rel="icon" type="image/png" href="<?php echo img_url('logo.PNG') ?>" />
	</head>

	<body class="templatemo-bg-image-1">
		<div class="container">
			<div class="col-md-12">			
				<form class="form-horizontal templatemo-login-form-2" role="form" action="<?php echo site_url(array('Community_Manager','FAddCommunity')) ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h">INSCRIVEZ VOUS </h1>
							<input type = "button" value = "x" style=" float: right; margin-top: -75px;"  onclick = "history.go(-1)">
						</div>
					</div>
					<?php 
					 	if (isset($_SESSION['message_save'])) { ?>
				 			<div style="color:red; font-weight:bold; text-align:center;">
				 				<?php echo ($_SESSION['message_save']);  ?> 
				 			</div>
				 		<?php session_destroy(); ?> 
				 	<?php } ?>
					<div class="row">
						<div class="templatemo-one-signin col-md-6">
					        <!-- <div class="form-group"> -->
						        <div class="col-md-12">		          	
						            <label for="Nom"> <sup style="color: red;">* </sup>Nom(s):</label>
									<div class="input-group">
										<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
										<input  class="form-control inputt validity " type="text" name="nom" id="Nom" required="" placeholder="Votre Nom" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" title=" saisir votre nom sans caractere special">
										<!-- <span class="input-group-addon essai Valid"> <span class="validity " style="background-color: none;"></span> </span> -->
									</div>
									<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>		            		              		            
						        </div>              
					        <!-- </div> -->
					        <!-- <div class="form-group"> -->
						        <div class="col-md-12">		          	
						            <label for="prenom"> <sup style="color: red;">* </sup>Prenom(s):</label>
									<div class="input-group">
										<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
										<input  class="form-control inputt validity " type="text" name="prenom" id="Prenom" required="" placeholder="Votre Nom" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" title=" saisir votre nom sans caractere special">
										<!-- <span class="input-group-addon essai Valid"> <span class="validity " style="background-color: none;"></span> </span> -->
									</div>
									<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>		            		              		            
						        </div>              
					        <!-- </div> -->
					        <!-- <div class="form-group"> -->
						        <div class="col-md-12">		          	
						            <label for="Email"> <sup style="color: red;">* </sup>Adresse email:</label>
									<div class="input-group">
										<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
										<input  class="form-control inputt validity " type="email" name="email" id="email" required="" placeholder="Example@example.com" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">
										<!-- <span class="input-group-addon essai Valid"> <span class="validity " style="background-color: none;"></span> </span> -->
									</div>
									<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>		            		              		            
						        </div>              
					        <!-- </div> -->
					        <!-- <div class="form-group"> -->
					          <div class="col-md-12">
						           <label for="Tel"> <sup style="color: red;">* </sup> Mot de passe : </label>
										<div class="input-group">
											<span class="input-group-addon essai"> <span class="glyphicon glyphicon-lock"> </span> </span>
											<input class="form-control inputt" type="PassWord" name="password" id="Pswd" required="" minlength="5" title="Entrer un mot de passe d'au moins 5 caracteres">
											<!-- <span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span> -->
										</div>
										<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
					          </div>   
					        
						</div>
						<div class=" col-md-6">
							<!-- <div class="form-group"> -->
								<label for="couleur_prefere"> <sup style="color: red;">* </sup>  couleur prefere : </label>
								<div class="input-group">
									<span Class="input-group-addon essai"><span class="glyphicon glyphicon-heart"></span></span>
									<input  class="form-control inputt validity " type="text" name="couleur_prefere" id="couleur_prefere" required="" placeholder="Votre couleur_prefere" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" title=" saisir votre couleur_prefere sans caractere special">
									<!-- <span class="input-group-addon essai Valid"> <span class="validity " style="background-color: none;"></span> </span> -->
								</div>
								<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
							<!-- </div> -->
							<div class="" >
									<!-- <label for="profil" ><sup style="color: red;">* </sup> Ajoutez Votre photo ( <span style="color: aqua;"> .png, .jpeg, .jpg | 100 Mo </span> ) </label>
									<div class="input-group">
										<span class="input-group-addon essai"> <span class="glyphicon glyphicon-picture"></span> </span>
										<input class="form-control inputt" type="file" id="photo" name="profil" accept="image/*" onchange="loadFile(event)" required=""/><br>
										<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
									</div>
									<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p> -->
									<span class="glyphicon glyphicon-picture"></span>
                            <label>Telecharger votre photo de profil</label>
                            <div class="input-group">
                                <input class="form-control inpt7" type="file" name="profil" accept="image/*" onchange="loadFile(event)" required="" >
                                <!-- <span class="validity input-group-addon" style="background-color: none;"></span> -->
                            </div>
                                <img id="pp" style="width: 100px; height: 100px;" />
                              
						    </div>
							  
						</div> 
					</div><br>
					<div class="row">
					    <div class="form-group">
						    <div class="col-md-12">
						    	<input class="form-control inpt4" type="hidden" name="notif" value="1">
								<input class="form-control inpt4" type="hidden" name="niveau" value="1">
						        <input  type="submit"  class="  btn btn-success " id="Send">
						    </div>
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


					// Detection Appui Boutton Send
					// Send.addEventListener('click' , function(){
					// 	for (var i = Zone.length - 1; i >= 0; i--) {
					// 		if (Zone[i].value == 0 || pays.value == "disabled" ) {
					// 			Message_erreur[i].style.opacity = '1';
					// 			cpt+=1;
					// 		}

					// 		if (cpt != 0) {
					// 			formulaire.submit();
					// 			break;
					// 		}
					// 	}
					// })


					// // Evenement sur nom
					// Zone[0].addEventListener('blur' , function(){
					// 	Valid[0].style.opacity = '1';
					// 	if (Zone[0].value == 0 || Zone[0].value == "disabled" ) {
					// 			Message_erreur[0].style.opacity = '1';
					// 			Etoile_erreur[0].style.opacity = '1';
					// 			Zone[0].style.boxShadow = '0px 0px 5px red';
					// 			Zone[0].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[0].style.opacity = '0';
					// 			Etoile_erreur[0].style.opacity = '0';
					// 			Zone[0].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[0].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })

					// // Evenement sur prenom
					// Zone[1].addEventListener('blur' , function(){
					// 	Valid[1].style.opacity = '1';
					// 	if (Zone[1].value == 0 || Zone[0].value == "disabled" ) {
					// 			Message_erreur[1].style.opacity = '1';
					// 			Etoile_erreur[1].style.opacity = '1';
					// 			Zone[1].style.boxShadow = '0px 0px 5px red';
					// 			Zone[1].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[1].style.opacity = '0';
					// 			Etoile_erreur[1].style.opacity = '0';
					// 			Zone[1].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[1].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })

					// // Evenement sur Email
					// Zone[2].addEventListener('blur' , function(){
					// 	Valid[2].style.opacity = '1';
					// 	if (Zone[2].value == 0 || Zone[2].value == "disabled" ) {
					// 			Message_erreur[2].style.opacity = '1';
					// 			Etoile_erreur[2].style.opacity = '1';
					// 			Zone[2].style.boxShadow = '0px 0px 5px red';
					// 			Zone[2].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[2].style.opacity = '0';
					// 			Etoile_erreur[2].style.opacity = '0';
					// 			Zone[2].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[2].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })

					// // Evenement sur password
					// Zone[3].addEventListener('blur' , function(){
					// 	Valid[3].style.opacity = '1';
					// 	if (Zone[3].value == 0 || Zone[3].value == "disabled" ) {
					// 			Message_erreur[3].style.opacity = '1';
					// 			Etoile_erreur[3].style.opacity = '1';
					// 			Zone[3].style.boxShadow = '0px 0px 5px red';
					// 			Zone[3].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[3].style.opacity = '0';
					// 			Etoile_erreur[3].style.opacity = '0';
					// 			Zone[3].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[3].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })

					// // Evenement sur couleur preferee
					// Zone[4].addEventListener('blur' , function(){
					// 	Valid[4].style.opacity = '1';
					// 	if (Zone[4].value == 0 || Zone[4].value == "disabled" ) {
					// 			Message_erreur[4].style.opacity = '1';
					// 			Etoile_erreur[4].style.opacity = '1';
					// 			Zone[4].style.boxShadow = '0px 0px 5px red';
					// 			Zone[4].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[4].style.opacity = '0';
					// 			Etoile_erreur[4].style.opacity = '0';
					// 			Zone[4].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[4].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })


					// // Evenement sur meilleur amie
					// Zone[5].addEventListener('blur' , function(){
					// 	Valid[5].style.opacity = '1';
					// 	if (Zone[5].value == 0 || Zone[5].value == "disabled" ) {
					// 			Message_erreur[5].style.opacity = '1';
					// 			Etoile_erreur[5].style.opacity = '1';
					// 			Zone[5].style.boxShadow = '0px 0px 5px red';
					// 			Zone[5].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[5].style.opacity = '0';
					// 			Etoile_erreur[5].style.opacity = '0';
					// 			Zone[5].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[5].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })

					// // Evenement sur image
					// Zone[6].addEventListener('change' , function(){
					// 	Valid[6].style.opacity = '1';
					// 	if (Zone[6].value == 0 || pays.value == "disabled" ) {
					// 			Message_erreur[6].style.opacity = '1';
					// 			Etoile_erreur[6].style.opacity = '1';
					// 			Zone[6].style.boxShadow = '0px 0px 5px red';
					// 			Zone[6].style.backgroundColor = 'rgb(255,202,202)';
					// 	}else{
					// 			Message_erreur[6].style.opacity = '0';
					// 			Etoile_erreur[6].style.opacity = '0';
					// 			Zone[6].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					// 			Zone[6].style.backgroundColor = 'rgb(183,255,179)';
					// 	}
					// })
			</script>
	</body>
</html>
