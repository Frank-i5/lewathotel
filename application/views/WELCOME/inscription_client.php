<div class="row ix1">
			<div class=" form1 col-md-offset-2 col-md-8  col-xs-12 col-xm-offset-2 col-xm-10" style="margin-top:100px; margin-bottom: 100px;">
				<h3 style="color:#BD655B;">INSCRIVEZ VOUS</h3>
				<p style="text-align:center; color:white;">C'est gratuit et ça le restera toujours!!</p>
                <h4 class="text-center">
						<?php 
						 	if (isset($_SESSION['message_save'])) { ?>
					 			<div style="color:red; font-weight:bold; text-align:center;">
					 				<?php echo ($_SESSION['message_save']);  ?> 
					 			</div>
					 		<?php session_destroy(); ?> 
					 	<?php } ?>
                </h4>
				<form enctype="multipart/form-data" method="post" action="<?php echo site_url(array('Client','AddClient')) ?>" id="myform" class="formulaire" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-5 col-xm-5 col-xs-offset-1 col-xs-11 form2">
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
						</div>

						<div class="col-md-offset-1 col-md-5 col-md-pull-1 col-xm-5 col-xs-offset-1 col-xs-11 form3">

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
						</div>
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