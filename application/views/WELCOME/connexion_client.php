<?php  
      echo css('css/bootstrap');
      echo css('bootstrap.min');
      echo css('fonts/glyphicons-halflings-regular');
      echo css('fonts/glyphicons-halflings-regular');
      echo css('font-awesome.min');
      echo css('css/style');
      echo css('css/style1');
      echo css('css/style2');
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

<div class="row ix1">
			<div class=" form1 col-md-offset-2 col-md-8  col-xs-12 col-xm-offset-2 col-xm-10" style="margin-top:100px; margin-bottom: 100px;">
				<h3 style="color:#BD655B;">CONNECTEZ VOUS</h3>
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
				<form enctype="multipart/form-data" method="post" action="<?php echo site_url(array('Client','manageConnexion')) ?>" id="myform" class="formulaire" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-offset-4 col-md-4 col-md-offset-4 col-xm-5 col-xs-offset-1 col-xs-11 form2">
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
						</div> 
					</div>
				</form>		
			</div>
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