<?php echo css('forum-style') ?>

	<style>

		/* Button used to open the chat form - fixed at the bottom of the page */
		.open-button {;
		  border: none;
		  cursor: pointer;
		}

		/* The popup chat - hidden by default */
		.chat-popup {
		  display: none;
		  border: 3px solid #f1f1f1;
		  z-index: 9;
		}

		/* Add styles to the form container */
		.form-container {
		  background-color: white;
		}

		/* Full-width textarea */
		.form-container input {
		  /*width: 100%;
		  padding: 15px;
		  margin: 5px 0 22px 0;*/
		  border: none;
		  background: #f1f1f1;
		  resize: none;
		}

		/* When the textarea gets focus, do something */
		.form-container input:focus {
		  background-color: #ddd;
		  outline: none;
		}

		/* Set a style for the submit/send button */
		.form-container .boutw {
		  border: none;
		  cursor: pointer;
		}

		/* Add a red background color to the cancel button */
		.form-container .cancel {
		  background-color: red;
		}

		/* Add some hover effects to buttons */
		.form-container .boutw:hover, .open-button:hover {
		  opacity: 1;
		}


		.templatemo-contact-form-1 {
    		background: rgba(0,0,0,0.6);
    		border-radius: 8px;
    		color: rgb(197,197,197);
    		max-width: 600px;
    		margin: 30px auto 0 auto;
    		padding: 0 30px 30px 30px;
		}
	</style>

	<div class="container-wrapper">
		<div class="row" style="margin-top:150px;">
			

				<div class="col-md-offset-5 col-md-4 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8" style="text-align:center; color:white;" >

					<section class="content-header">
						<h3 style="color:#00C2A9;">Mes Informations Personnelles</h3>
						<nav style="margin-top:20px;">
	    					<?php if (isset($_SESSION['Community_Manager'])) {?>
					            <?php echo imgProfil($_SESSION['Community_Manager']['profil'], 'user-image cl','user-image','user-image'); ?>
					            <?php }  ?>
	    				</nav>

	    				<nav style="margin-top:20px;">
	    				<?php if (isset($_SESSION['Community_Manager'])) {?>
					    <label for="nom">Nom :<?php echo $_SESSION['Community_Manager']['nom']?></label><br>
					    <label for="prenom">Email :<?php echo $_SESSION['Community_Manager']['prenom'] ?></label><br>
					    <label for="email">Email :<?php echo $_SESSION['Community_Manager']['email'] ?></label><br>
					    <label for="password">Password :<?php echo $_SESSION['Community_Manager']['password'] ?></label><br>
					    <button class="pull pull-right open-button fa fa-pencil" style="background-color:#00C2A9;" onclick="openForm()">Modifier</button>
					    <?php } ?>
					    </nav>
				    </section>


				    <section class="content chat-popup" id="myForm" style="margin-top:50px;">

		                <form class="form-horizontal templatemo-contact-form-1" role="form" action="<?php if(isset($_SESSION['Community_Manager'])) { echo site_url(array('Community_Manager','modifierprofil')); }?>" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<div class="col-md-12">
									<p style="color:white;"><?php if (isset($_SESSION['message_error'])) { echo $_SESSION['message_error'];
	    							} ?></p>
									<h4 class="margin-bottom-15" style="color:#00C2A9;">Veuillez Modifier Votre Profil en Remplissant ce Formulaire</h4>
								</div>
							</div>				
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			            			<i class="input-group-addon fa fa-user"></i>		          	
			            			<label for="nom" class="input-group-addon control-label">Nom *</label>
			                		<input id="nom" class="form-control" type="text" name="newnom" value="<?php if (isset($_SESSION['Community_Manager'])){echo $_SESSION['Community_Manager']['nom'];}?>" required>
			            			</div>		            		            		            
			         			 </div>              
			        		</div>
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			            			<i class="input-group-addon fa fa-user"></i>
			            			<label for="prenom" class="input-group-addon control-label">Prenom *</label>
			                		<input id="prenom" class="form-control" type="text" value="<?php if (isset($_SESSION['Community_Manager'])){echo $_SESSION['Community_Manager']['prenom'];}?>" class="form-control" name="newprenom">
			            			</div>
			         			 </div>
			        		</div>
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			            			<i class="input-group-addon fa fa-envelope-o"></i>
			            			<label for="email" class="input-group-addon control-label">Email</label>
			                		<input id="email" class="form-control" type="text" type="email" value="<?php if (isset($_SESSION['Community_Manager'])){echo $_SESSION['Community_Manager']['email'];}?>" class="form-control" name="newemail">
			            			</div>
			          			</div>
			        		</div>
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			                		<span class="input-group-addon fa fa-lock"></span>
			            			<label for="password" class="input-group-addon control-label">Mot de pass Actuel *</label>
			                		<input id="pass" class="form-control" type="password" name="password" value="<?php echo $_SESSION['Community_Manager']['password'] ?>">
			            			</div>
			          			</div>
			        		</div>
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			                		<span class="input-group-addon fa fa-lock"></span>
			            			<label for="password" class="input-group-addon control-label">Nouveau Mot de pass *</label>
			                		<input id="pass" class="form-control" type="password" value="<?php if (isset($_SESSION['Community_Manager'])){echo $_SESSION['Community_Manager']['password'];}?>" class="form-control" name="newpassword">
			            			</div>
			          			</div>
			        		</div>
			        		<div class="form-group">
			          			<div class="col-md-12">
			            			<div class="input-group templatemo-input-icon-container">
			            			<label for="profil" class="input-group-addon control-label">Nouveau Profil *</label>
			                		<input class="form-control inpt7" type="file" name="newprofil" accept="image/*" onchange="loadFile(event)" required="" >
			            			</div>		            
			          			</div>
			        		</div>
			        		<div class="col-md-offset-3 col-md-4 im">
			            		<img style="width:200px; height:200px;" id="im" src="<?php if (isset($_SESSION['Community_Manager'])){echo imgProfil_url($_SESSION['Community_Manager']['profil']);}?>"/>
			        		</div>
			       			<div class="form-group">
			          			<div class="col-md-12"><br> <br>
                      				<input type="hidden" value="<?php echo $_SESSION['Community_Manager']['id'] ?>" name="id">
	        						<button type="button" class="boutw btn btn-danger" onclick="closeForm()">Fermer</button>
			            			<button class="btn" type="submit" style="background-color:#00C2A9; color:white;">Enregistrer</button>
	        						<a href="<?php if(isset($_SESSION['Community_Manager'])) { echo site_url(array('Administration','formmodifierprofil')); }?>"></a>
			          			</div>
			        		</div>		    	
			    		</form>
	                </section>
	           	</div>
		</div>
	</div>

	<script type="text/javascript">
		var formulaire = document.getElementById('form');
		var modif = document.getElementById('modif');
		var input = document.getElementsByTagName('input');
		var Send = document.getElementById('Send'); 
		var profil = document.getElementById('pp');
		var BlocPhoto = document.getElementById('ppp');
		var source = input[0].getAttribute('src');
		console.log(BlocPhoto);
		console.log(profil);
		

    // previsualisation image dans formulaire
			var loadFile = function(event) {
      profil.src = URL.createObjectURL(event.target.files[0]);
    };


		// Detection Appui Boutton Send
		Send.addEventListener('click' , function(){
			input[3].removeAttribute('disabled');
			formulaire.submit();
		});


		// Evenement sur nom
		input[1].addEventListener('blur' , function(){
			
		})

		// Evenement sur prenom
		input[2].addEventListener('blur' , function(){
			
		})


		// Evenement sur password
		input[4].addEventListener('blur' , function(){
			
		});

		//Evenement sur annuler
		input[5].addEventListener('click', function(){
			BlocPhoto.removeChild(BlocPhoto.lastElementChild);
			BlocPhoto.appendChild(profil);
			console.log('ici BlocPhoto'+BlocPhoto);
		});

		// Evenement sur image
		input[0].addEventListener('change' , function(){
			
		});

		// desactivation modification profil
		function Masque() {
			for (var i = input.length - 3; i >= 0; i--) {
					input[i].setAttribute('disabled','true');
				}
			input[5].style.display= 'none';	
			input[6].style.display= 'none';	
		}
		Masque();

		// activation modification profil
		modif.addEventListener('click' , function(){
			for (var i = input.length - 3; i >= 0; i--) {
					if (i==3) {
						continue;
					} else{
						input[i].removeAttribute('disabled');
					}
				}
			input[5].style.display= 'block';	
			input[6].style.display= 'block';	
		});
	</script>
	<?php 
		unset($_SESSION['message_error']);
	?>

	<script>
		function openForm() {
		  document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		}
	</script>


    <script type="text/javascript">
      	var loadFile = function(event) {
        var profil = document.getElementById('im');
          	profil.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>
</html>