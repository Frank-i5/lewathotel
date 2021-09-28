<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {
	
	public function index(){
		
		 if (isset($_SESSION['ADMIN'])) {
		 	
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/home');
			$this->load->view('ADMIN/footer');
		
				
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}
	 		
	
	// fonction qui charge le formulaire de connexion pour un administrateur
	public function formulaireConnexion(){
		
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_SESSION['ADMIN'])) {
				redirect(site_url(array('Administration','index')));
			}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
		}else{
			$this->load->view('gestion_admin/formulaire_connexion');
		}
	}

	// Gestions des Administrateurs


	public function manageAdmin(){
		
		if (isset($_SESSION['ADMIN'])) {
			
			$data['AllAdmin']=$this->Admin->findAllAdminBd();
			$this->load->view('WELCOME/index',$data);
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/home_admin');
			$this->load->view('WELCOME/footer');
			
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	// Vérifier si un Administrateur existe en vérifiant l'email
	public function testExitAdmin($email){
        $etat=0;
        $data['infoAdmin']=$this->Admin->findAllAdminBd();
        if ($data['infoAdmin']['total']<=0) {
            
        }else{
            for ($i=0; $i <$data['infoAdmin']['total'] ; $i++) { 
                if ($data['infoAdmin'][$i]['email']==$email) {
                    $etat=1;
                    break;
                }else{
                    $etat=0;
                }
            }
        }
        return $etat;
	}

	public function manageConnexion(){
		
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$admin = $this->Admin->findAllAdminBd();
			for ($i=0; $i < $admin['total']; $i++) { 
				 if ($admin[$i]['email'] == $_POST['email'] && $admin[$i]['password'] == $_POST['password']) {
				 	$a=$admin[$i]['id_user'];
				 	$_SESSION['ADMIN'] = $admin[$i] ;
				 	$info=$this->User->finduserInfos($a);
					$etat=1;
					
				}else{
					$etat=0;
				}
		 	}
			
			if ($etat==1) {
				$_SESSION['ADMIN']['nom'] = $info['nom'];
				$_SESSION['ADMIN']['prenom'] = $info['prenom'] ;
				$_SESSION['ADMIN']['nom'] = $info['nom'];
				$_SESSION['ADMIN']['profil'] = $info['profil'];
				$_SESSION['ADMIN']['telephone'] = $info['telephone'];
				redirect(site_url(array('Administration','index')));
			}else{
				$_SESSION['ERR'] = 'Les paramètres recus ne correspondent à aucun adminstrateur dans notre Serveur.<br> <b>Veillez recommencer SVP</b>';
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
		}
		else{
			redirect(site_url(array('Administration','formulaireConnexion')));
			
		}
	}


	public function deconnexion(){
		if (isset($_SESSION['ADMIN'])) {
			session_destroy();
		}
		redirect(site_url(array('Administration','index')));
	}

	// éditer le profil


	public function voirprofil(){
		if (isset($_SESSION['ADMIN'])) {
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/profil');
			$this->load->view('ADMIN/footer');
		}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
	}

	// formulaire de modification du profil

	public function formmodifierprofil(){
		if (isset($_SESSION['ADMIN'])) {
			echo "gfgfgfg";
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/profil');
			$this->load->view('ADMIN/footer');	
		}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
	}

	// modification du profil

	public function modifierprofil(){
		if (isset($_SESSION['ADMIN'])) {
			print_r($_POST);
			if (isset($_POST) AND !empty($_POST)) {
				print_r($_POST);

				if ($_POST['newnom']!=$_SESSION['ADMIN']['nom']) {
					$data['nom']=$_POST['newnom'];
				}else{
					$data['nom']=$_SESSION['ADMIN']['nom'];
				}
				if ($_POST['newprenom']!=$_SESSION['ADMIN']['prenom']) {
					$data['prenom']=$_POST['newprenom'];
				}else{
					$data['prenom']=$_SESSION['ADMIN']['prenom'];
				}
				if ($_POST['newemail']!=$_SESSION['ADMIN']['email']) {
					$data['email']=$_POST['newemail'];
				}else{
					$data['email']=$_SESSION['ADMIN']['email'];
				}
				if ($_POST['newpassword']!=$_SESSION['ADMIN']['password']) {
					$data['password']=$_POST['newpassword'];
				}else{
					$data['password']=$_SESSION['ADMIN']['password'];
				}
				if ($_FILES['newprofil']['name']!=$_SESSION['ADMIN']['profil']) {
					if ($_FILES['newprofil']['size'] <= 100000000 ){
						if ($_FILES['newprofil']['error']==0) {
							$extensions_autorisees = array('jpg', 'jpeg', 'png','JPEG','PNG','JPG');
							$infosfichier =pathinfo($_FILES['newprofil']['name']);
							 $extension_upload = $infosfichier['extension'];
				            if (in_array($extension_upload, $extensions_autorisees))
				            {
				            	$config =$infosfichier['filename'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i');
				            	$ma_variable = str_replace('.', '_', $config);
								$ma_variable = str_replace(' ', '_', $config);
								$config = $ma_variable.'.'.$extension_upload;
								move_uploaded_file($_FILES['newprofil']['tmp_name'],'assets/images/user_profil/'.$config);
								$data['profil']=$config;
				               $statut_img="ok";
				            }else{
				               $statut_img="non";
				            }
				            if ($statut_img=="ok") {
				            	$data['id']=$_SESSION['ADMIN']['id'];
				            	$data['id_user']=$_SESSION['ADMIN']['id_user'];
				            	$this->Admin->hydrate($data);
				            	$this->Admin->UpdateAdmin();
				            	$this->User->hydrate($data);
				            	$this->User->UpdateUserinfo();
				          		$this->load->view('ADMIN/index');
								$this->load->view('template_al/navigation');
								$this->load->view('ADMIN/profil');
								$this->load->view('ADMIN/footer');
								$_SESSION['message_save']='modification effective';
								$_SESSION['ADMIN']['nom']=$data['nom'];
								$_SESSION['ADMIN']['prenom']=$data['prenom'];
								$_SESSION['ADMIN']['email']=$data['email'];
								$_SESSION['ADMIN']['profil']=$data['profil'];

								redirect(site_url(array('Administration','index')));
				            }else{
				            	$_SESSION['message_error']='!!echec de modification';
				            	redirect(site_url(array('Administration','formmodifierprofil')));

				            }
						}else{
							$erreur='non';
							$data['message_save']="L'image choisie  est endommagée  veuillez le remplacer svp !!";
						}
					}else{
						$data['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
						$data['message']='non';
					}
				}else{
					echo "string";
					redirect(site_url(array('Administration','voirprofil')));
				}
				
			}else{
				echo "string";
				redirect(site_url(array('Administration','voirprofil')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function testExitClient($email){
        $etat=0;
        $data['Client']=$this->Client->findAllClient();
        if ($data['Client']['total']<=0) {
            
        }else{
            for ($i=0; $i <$data['Client']['total'] ; $i++) { 
                if ($data['Client'][$i]['email']==$email) {
                    $etat=1;
                    break;
                }else{
                    $etat=0;
                }
            }
        }
        return $etat;
	}


		// Ajoute un C en BD //
		public function AddClient(){
		// print_r($_FILES);  
				if ( isset($_POST) ) {
					// print_r($_POST);
					$etat = $this->testExitClient( $_POST['email'] );
					if ( $etat==0 ) { 
						if (isset($_FILES['profil']) AND $_FILES['profil']['error'] == 0 ){
							//Testons si le fichier n'est pas trop gros
							if ($_FILES['profil']['size'] <= 100000000){ // 8 zero
									// Testons si l'extension est autorisée
									$infosfichier = pathinfo($_FILES['profil']['name']);
									$extension_upload = $infosfichier['extension'];

									$config = $infosfichier['filename'].date('d').''.date('m').''.date('Y').''.date('H').''.date('i');
									$ma_variable = str_replace('.', '_', $config);
									$ma_variable = str_replace(' ', '_', $config);
									$config = $ma_variable.'.'.$extension_upload;
									move_uploaded_file($_FILES['profil']['tmp_name'],'assets/images/user_profil/'.$config);
									$data2['profil'] = $config;

									$data2['nom'] = $_POST['nom'];
									$data2['prenom'] = $_POST['prenom'];
									$data2['notif'] = $_POST['notif'];
									$data2['niveau'] = $_POST['niveau'];
									$data2['telephone'] = $_POST['telephone'];

									$this->User->hydrate($data2);
									$this->User->AddUser($data2);

									$lastuser = $this->User->findLastUser();
									$data1['id_user'] = $lastuser['user']['id'];
									$data1['email'] = $_POST['email'];
									$data1['password'] = $_POST['password'];
									//print_r($data1);
								
									$this->Client->hydrate($data1);
									$this->Client->AddClient($data1);

									$_SESSION['message_save']=" Votre Compte a ete Créé avec success !!";
									$_SESSION['success']='ok';
									redirect(site_url(array('Administration','index')));
				
							}else{
									$_SESSION['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
									$_SESSION['message']='non';
									redirect(site_url(array('Administration','inscription')));
							}
						}else{
							$_SESSION['message_save']="L'image choisie  est endommagée  veuillez la remplacer svp !!";
							$_SESSION['message']='non';
							redirect(site_url(array('Administration','inscription')));
						}

						
						
					} else{
							redirect(site_url(array('Administration','inscription')));
					}
				} else{
			  	redirect(site_url(array('Administration','inscription')));
				}
		}	

		// renvoie vers le formulaire de connexion
		public function inscription() {
			$this->load->view('ADMIN/inscription');
		}



		public function testExitCommunity($email){
        $etat=0;
        $data['Community_Manager']=$this->CommunityManager->findAllCommunityBd();
        if ($data['Community_Manager']['total']<=0) {
            
        }else{
            for ($i=0; $i <$data['Community_Manager']['total'] ; $i++) { 
                if ($data['Community_Manager'][$i]['email']==$email) {
                    $etat=1;
                    break;
                }else{
                    $etat=0;
                }
            }
        }
        return $etat;
	}


		// Ajoute un Community Manager en BD //
		public function AddCommunity(){
		// print_r($_FILES);  
				if ( isset($_POST) ) {
					// print_r($_POST);
					$etat = $this->testExitCommunity( $_POST['email'] );
					if ( $etat==0 ) { 
						if (isset($_FILES['profil']) AND $_FILES['profil']['error'] == 0 ){
							//Testons si le fichier n'est pas trop gros
							if ($_FILES['profil']['size'] <= 100000000){ // 8 zero
									// Testons si l'extension est autorisée
									$infosfichier = pathinfo($_FILES['profil']['name']);
									$extension_upload = $infosfichier['extension'];

									$config = $infosfichier['filename'].date('d').''.date('m').''.date('Y').''.date('H').''.date('i');
									$ma_variable = str_replace('.', '_', $config);
									$ma_variable = str_replace(' ', '_', $config);
									$config = $ma_variable.'.'.$extension_upload;
									move_uploaded_file($_FILES['profil']['tmp_name'],'assets/images/user_profil/'.$config);
									$data2['profil'] = $config;

									$data2['nom'] = $_POST['nom'];
									$data2['prenom'] = $_POST['prenom'];
									$data2['notif'] = $_POST['notif'];
									$data2['niveau'] = $_POST['niveau'];
									$data2['telephone'] = $_POST['telephone'];

									$this->User->hydrate($data2);
									$this->User->AddUser($data2);

									$lastuser = $this->User->findLastUser();
									$data1['id_user'] = $lastuser['user']['id'];
									$data1['email'] = $_POST['email'];
									$data1['password'] = $_POST['password'];
									//print_r($data1);
								
									$this->CommunityManager->hydrate($data1);
									$this->CommunityManager->AddCommunity1($data1);

									$_SESSION['message_save']=" Votre Compte a ete Créé avec success !!";
									$_SESSION['success']='ok';
									redirect(site_url(array('Administration','index')));
				
							}else{
									$_SESSION['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
									$_SESSION['message']='non';
									redirect(site_url(array('Administration','inscriptionCommunity')));
							}
						}else{
							$_SESSION['message_save']="L'image choisie  est endommagée  veuillez la remplacer svp !!";
							$_SESSION['message']='non';
							redirect(site_url(array('Administration','inscriptionCommunity')));
						}

						
						
					} else{
							redirect(site_url(array('Administration','inscriptionCommunity')));
					}
				} else{
			  	redirect(site_url(array('Administration','inscriptionCommunity')));
				}
		}	

		// renvoie vers le formulaire de connexion
		public function inscriptionCommunity() {
			$this->load->view('ADMIN/inscription_community');
		}

	// fonction pour afficher la liste des utilisateurs
	public function Utilisateur() {
		if (isset($_SESSION['ADMIN'])) {
			$alluser = $this->Client->findAllClient();
			$data['alluser']=$alluser;
			for ($i=0; $i <$data['alluser']['total'] ; $i++) { 
				$data['id_user'][$i]=$this->User->finduserInfos($data['alluser'][$i]['id_user']);
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/listes_utilisateurs',$data);
			$this->load->view('ADMIN/footer');
			}
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','index')));
		}
	}

	// fonction pour afficher la liste des community manager
	public function community() {
		if (isset($_SESSION['ADMIN'])) {
			$alluser = $this->CommunityManager->findAllCommunityBd();
			$data['alluser']=$alluser;
			for ($i=0; $i <$data['alluser']['total'] ; $i++) { 
				$data['id_user'][$i]=$this->User->finduserInfos($data['alluser'][$i]['id_user']);
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/listes_community',$data);
			$this->load->view('ADMIN/footer');
			}
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','index')));
		}
	}

	public function supprimerCommunity(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST)) {
				$this->CommunityManager->deleteCommunity($_POST['id']);
				redirect(site_url(array('Administration','community')));

			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	// fonction pour bloquer un utilisateur en BD
	public function BloquerUser() {
		  if (isset($_SESSION['ADMIN'])) {
			$this->User->blocUser($_POST['cible']);
			redirect(site_url(array('Administration','listBloquerUser')));
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	// fonction pour afficher la liste des utilisateurs en vue de les bloquer
	public function listBloquerUser() {
		 if (isset($_SESSION['ADMIN'])) {
			$listclient['hotel'] = $this->User->findAllUserBd();
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/bloqueruser',$listclient);
			$this->load->view('ADMIN/footer');
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	// fonction pour afficher la liste des utilisateurs bloque
	public function listDebloquerUser() {
		 if (isset($_SESSION['ADMIN'])) {
			$listclient['hotel'] = $this->User->findBlockUser();
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('ADMIN/debloqueruser',$listclient);
			$this->load->view('ADMIN/footer');
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	// fonction pour debloquer un utilisateur en BD
	public function DebloquerUser() {
		  if (isset($_SESSION['ADMIN'])) {
			$this->User->deblocUser($_POST['cible']);
			redirect(site_url(array('Administration','listDebloquerUser')));
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function addoffre(){

		if (isset($_SESSION['ADMIN'])){
			if(isset($_POST)){
				if (isset($_POST['nom_offre'])) {
					$data['nom_offre']=$_POST['nom_offre'];
					$data['id_user']=$_POST['id_user'];
					$data['niveau']=$_POST['niveau'];
					$data['date_creation']=date('Y-m-d H:i:s');
					$this->Offre->hydrate($data);
					$this->Offre->addOffre();
					$_SESSION['message_save']="L'Offre est enregistrée avec success !!";
				 	$_SESSION['success']='ok';
				 	redirect(site_url(array('Administration','listeOffre')));
				}else{
					redirect(site_url(array('Administration','index')));
				}
			}else{
				$data['message']='non';
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}

	public function formulaireAddOffre(){
		if(isset($_SESSION['ADMIN'])){
			$allService=$this->Service->findAllServicemodel();
			$data['alluser']= $this->User->findAllUsersBd();
			$data['allService']= $this->Service->findAllServiceinbd();
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/formulaireAddOffre',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}
	public function listeOffre(){
		if(isset($_SESSION['ADMIN'])){
			$Toffre = $this->Offre->findAllOffreBd();
			$allUser=$this->User->findAdmin();
			$allUser1=$this->User->findCommunity();
			$trouve = 'non';
			if($Toffre['data']=="non"){
				$message="Aucune offre disponible!";
				$etat="non";
			}else{
				$etat="ok";
			for($i=0; $i<$Toffre['total']; $i++){
				$allservice[$i]= $this->Service->findServiceinbd($Toffre[$i]['id']);
			 	for ($j=0; $j<$allUser['total']; $j++){
			 		if($Toffre[$i]['id_user']==$allUser[$j]['id']){
			 			$Toffre[$i]['createur']= $allUser[$j]['nom'].' '.$allUser[$j]['prenom'];
			 			//$trouve = 'ok';
			 			break;
			 		}
			 	}
			}
			if ($trouve == 'non') {
				// $erreur = 'non';
				for($i=0; $i<$Toffre['total']; $i++){
				 	for ($j=0; $j<$allUser1['total']; $j++){
				 		if($Toffre[$i]['id_user']==$allUser1[$j]['id']){
				 			$Toffre[$i]['createur']= $allUser1[$j]['nom'].' '.$allUser1[$j]['prenom'];
				 			break;
				 		}
				 	}
				}
			}
			for ($i=0; $i <$Toffre['total'] ; $i++) { 
				$allservice[$i]=$this->Service->findServiceinbd($Toffre[$i]['id']);

			}
			}

			if($etat=="ok"){
			print_r($allservice);
			$data['allservice']=$allservice ;
			$data['nom']=$Toffre;
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/listeOffre',$data);
			$this->load->view('ADMIN/footer');
		}else{
			$data['message']=$message;
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/listeOffre',$data);
			$this->load->view('ADMIN/footer');
		}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}

	}

	public function service_offre(){
		if(isset($_SESSION['ADMIN'])){
			if (isset($_POST)) {
				
				$service=$this->Service->findAllServiceinbd();
				$allUser=$this->User->findAdmin();
				$allUser1=$this->User->findCommunity();
				$trouve='non';
					$j=0;
					$s=0;
				for ($i=0; $i<$service['total']; $i++){
					if($service[$i]['id_offre']==$_POST['id']){
						$serviceok[$s]=$service[$i];
						$s++;

					}
				} 

				for($i=0; $i<$s; $i++ ){
					for($k=0; $k<$allUser['total']; $k++){
						if($serviceok[$i]['id_user']==$allUser[$k]['id']){
							$serviceok[$i]['nom']=$allUser[$k]['nom'].' '.$allUser[$k]['prenom'];
							//$trouve='ok';
							break;
						}
					}

				}

				if ($trouve =='non') {
					for($i=0; $i<$s; $i++ ){
						for($k=0; $k<$allUser1['total']; $k++){
							if($serviceok[$i]['id_user']==$allUser1[$k]['id']){
								$serviceok[$i]['nom']=$allUser1[$k]['nom'].' '.$allUser1[$k]['prenom'];
								$trouve='ok';
								break;
							}
						}

					}
				}
				
				$serviceok['offre']=$_POST['nom_offre'];
				$serviceok['taille']=$s;
				$data['services']=$serviceok;
				$this->load->view('ADMIN/index');
				$this->load->view('template_al/navigation');
				$this->load->view('WELCOME/offre_service',$data);
				$this->load->view('ADMIN/footer');
	        }else{
	        	redirect(site_url(array('Administration','listeOffre')));
	        }
        }else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function formulairemodifOffre(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST) AND !empty($_POST)) {
				$ids= $_POST['id'];
				$offreinfos= $this->Offre->findoffreInfos($ids);
				$data['infooffre']=$offreinfos;
				$this->load->view('ADMIN/index');
				$this->load->view('template_al/navigation');
				$this->load->view('WELCOME/modifierOffre',$data);
				$this->load->view('ADMIN/footer');
			}else{
				redirect(site_url(array('Administration','listeOffre')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function modifierOffre(){
		if (isset($_SESSION['ADMIN'])){
			if(isset($_POST)){
				if (!empty($_POST['newnom_offre'])){
					$data['nom_offre']=$_POST['newnom_offre'];
					$this->Offre->hydrate($data);
					$this->Offre->UpdateOffre($_POST['id_offre'],$_POST['newnom_offre'],$_POST['date_modification']);
					$_SESSION['message_save']="Votre Offre a été mofifiée avec success !!";
				 	$_SESSION['success']='ok';
				 	redirect(site_url(array('Administration','listeOffre')));
				}else{
					redirect(site_url(array('Administration','index')));
				}
			}else{
				$erreur='non';
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}


	public function supprimerOffre(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST)) {
				$this->Offre->deleteOffre($_POST['id_offre']);
				redirect(site_url(array('Administration','listeOffre')));

			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function addService(){
		if (isset($_SESSION['ADMIN'])) {
			if(isset($_POST)){
				if (!empty($_POST['nom_service']) AND !empty($_POST['id_offre']) AND !empty($_POST['id_user'])) {
					$data['id_user']=$_POST['id_user'];
					$data['id_offre']=$_POST['id_offre'];
					$data['nom_service']=$_POST['nom_service'];
					$data['niveau']=$_POST['niveau'];
					$data['date_creation']=date('Y-m-d H:i:s');
					$this->Service->hydrate($data);
					$this->Service->addService();
					redirect(site_url(array('Administration','liste_Service')));
				}else{
					redirect(site_url(array('Administration','index')));
				}
			}else{redirect(site_url(array('Administration','liste_Service')));}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}



	public function formulaireAddService(){
		if(isset($_SESSION['ADMIN'])){
			$Toffre = $this->Offre->findAllOffreBd();
			$data['nom']=$Toffre;
			$allService=$this->Service->findAllServicemodel();
			$data['alluser']= $this->User->findAllUsersBd();
			$data['allService']= $this->Service->findAllServiceinbd();
			 $this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/formulaireAddService',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function liste_Service(){
		if (isset($_SESSION['ADMIN'])) {
			$service=$this->Service->findAllServiceinbd();
			for ($i=0; $i <$service['total'] ; $i++) { 
				$iduser[$i]=$service[$i]['id_user'];
				$idoffre[$i]=$service[$i]['id_offre'];
			}
			for ($i=0; $i <$service['total'] ; $i++) { 
				$user= $this->User->finduserInfos($iduser[$i]);
				$service[$i]['nom']= $user['nom'].' '.$user['prenom'];
			}

			for ($i=0; $i <$service['total'] ; $i++) { 
				$offre= $this->Offre->findoffreInfos($idoffre[$i]);
				$service[$i]['offre']=$offre['nom_offre'];
			}
			$data['services']=$service;
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/listeService',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function supprimerService(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST)) {
				 $this->Service->deleteService($_POST['id']);
				 redirect(site_url(array('Administration','liste_Service')));
			}else{
				redirect(site_url(array('Administration','liste_Service')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function addProduit(){

			if (isset($_SESSION['ADMIN'])){
				if(isset($_POST)){
							$data['id_service']=$_POST['id_service'];
							$data['numero_produit']=$_POST['numero_produit'];
							$data['description']=$_POST['description'];
							$data['prix']=$_POST['prix'];
							$data['niveau']=$_POST['niveau'];
							$data['date_creation']=date('Y-m-d H:i:s');
							$this->Produit->hydrate($data);
							$this->Produit->addProduit();
							redirect(site_url(array('Administration','liste_Produit')));
				}else{
					redirect(site_url(array('Administration','index')));
				}

			}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
			}
	}

	public function produit_service(){
		if(isset($_SESSION['ADMIN'])){
			if (isset($_POST)) {
				
				$produit=$this->Produit->findAllProduitinbd();
				$allUser=$this->User->findAdmin();
				$allUser1=$this->User->findCommunity();
				$trouve='non';
					$j=0;
					$s=0;
				for ($i=0; $i<$produit['total']; $i++){
					if($produit[$i]['id_service']==$_POST['id']){
						$produitok[$s]=$produit[$i];
						$s++;

					}
				} 

				for($i=0; $i<$s; $i++ ){
					for($k=0; $k<$allUser['total']; $k++){
						if($produitok[$i]['id_user']==$allUser[$k]['id']){
							$produitok[$i]['nom']=$allUser[$k]['nom'].' '.$allUser[$k]['prenom'];
							//$trouve='ok';
							break;
						}
					}

				}

				if ($trouve =='non') {
					for($i=0; $i<$s; $i++ ){
						for($k=0; $k<$allUser1['total']; $k++){
							if($produitok[$i]['id_user']==$allUser1[$k]['id']){
								$produitok[$i]['nom']=$allUser1[$k]['nom'].' '.$allUser1[$k]['prenom'];
								$trouve='ok';
								break;
							}
						}

					}
				}
				
				$themeok['service']=$_POST['nom_service'];
				$themeok['taille']=$s;
				$data['produits']=$produitok;
				$this->load->view('ADMIN/index');
				$this->load->view('template_al/navigation');
				$this->load->view('service_produit',$data);
				$this->load->view('ADMIN/footer');
	        }else{
	        	redirect(site_url(array('Administration','listeService')));
	        }
        }else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
  	}


	public function liste_Produit(){
		if (isset($_SESSION['ADMIN'])) {
			$produit=$this->Produit->findAllProduitinbd();
			print_r($produit);
			for ($i=0; $i <$produit['total'] ; $i++) { 
				// $iduser[$i]=$produit[$i]['id_user'];
				$idservice[$i]=$produit[$i]['id_service'];
			}
			// for ($i=0; $i <$produit['total'] ; $i++) { 
			// 	$user= $this->User->finduserInfos($iduser[$i]);
			// 	$produit[$i]['nom']= $user['nom'].' '.$user['prenom'];
			

			for ($i=0; $i <$produit['total'] ; $i++) { 
				$service= $this->Service->findserviceInfos($idservice[$i]);
				$produit[$i]['service']=$service['nom_service'];
			}
			$data['produits']=$produit;
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/listeProduit',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function supprimerProduit(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST) AND !empty($_POST)) {
				 $this->Produit->deleteProduit($_POST['id']);
				 redirect(site_url(array('Administration','liste_Produit')));
			}else{
				redirect(site_url(array('Administration','liste_Produit')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}




    public function formulaireAddProduit(){
		if(isset($_SESSION['ADMIN'])){
			$Tservice = $this->Service->findAllServiceinbd();
			$data['nom']=$Tservice;
			$allProduit=$this->Produit->findAllProduitmodel();
			$data['alluser']= $this->User->findAllUsersBd();
			$data['allProduit']= $this->Produit->findAllProduitinbd();
			 $this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/formulaireAddProduit',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function formreserverProduit(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST) AND !empty($_POST)) {
				$data['post']=$_POST;
				$this->load->view('ADMIN/index');
				$this->load->view('template_al/navigation');
				$this->load->view('WELCOME/formulaireReservation',$data);
				$this->load->view('ADMIN/footer');
			}else{
				redirect('Administration','liste_Produit');
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	public function addReservation(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST) AND !empty($_POST)) {
				$data['id_user']=$_POST['id_user'];
				$data['id_produit']=$_POST['id_produit'];
				$data['date_arrivee']=$_POST['date_arrivee'];
				$data['date_depart']=$_POST['date_depart'];
				$data['nbre_personne']=$_POST['nbre_personne'];
				$data['statut']=$_POST['statut'];
				$this->Reservation->hydrate($data);
				$this->Reservation->addReservation();
				$this->Produit->empechersuppression($_POST['id_produit']);
				redirect('Administration','liste_Produit');
			}else{
				redirect('Administration','formreserverProduit');
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

		public function addPhotoP(){

			if (isset($_SESSION['ADMIN'])){
				if(isset($_POST)){
					if (($_FILES['photo'])  AND !empty($_POST['id_produit'])) {
						if ($_FILES['photo']['size'] <= 100000000 ){
							if ($_FILES['photo']['error']==0) {
								$extensions_autorisees = array('jpg', 'jpeg', 'png','JPEG','PNG','JPG');
								$infosfichier =pathinfo($_FILES['photo']['name']);
								 $extension_upload = $infosfichier['extension'];
					            if (in_array($extension_upload, $extensions_autorisees))
					            {
					            	$config =$_FILES['photo']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['id'];
					            	$ma_variable = str_replace('.', '_', $config);
									$ma_variable = str_replace(' ', '_', $config);
									$config = $ma_variable.'.'.$extension_upload;
									move_uploaded_file($_FILES['photo']['tmp_name'],'assets/images/'.$config);
									$data['photo']=$config;
					               $statut_img="ok";
					            }else{
					               $statut_img="non";
					            }
							}else{
								$erreur='non';
								$data['message_save']="L'image choisie  est endommagée  veuillez le remplacer svp !!";
							}
						}else{
							$data['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
							$data['message']='non';
						}
						if ($statut_img=="ok") {
							$data['id_produit']=$_POST['id_produit'];
							$data['niveau']=$_POST['niveau'];
							$data['date_creation']=date('Y-m-d H:i:s');
							$this->PhotoProduit->hydrate($data);
							$this->PhotoProduit->addPhotoProduit();
							redirect(site_url(array('Administration','liste_PhotoP')));;
						}else{
						redirect(site_url(array('Administration','index')));
						}

					}else{  
					redirect(site_url(array('Administration','liste_PhotoP')));
					}
				}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
				}
			}
		}

	public function photo_produit(){
		if(isset($_SESSION['ADMIN'])){
			if (isset($_POST)) {
				
				$photoproduit=$this->PhotoProduit->findAllPhotoProduitinbd();
				$allUser=$this->User->findAdmin();
				$allUser1=$this->User->findCommunity();
				$trouve='non';
					$j=0;
					$s=0;
				for ($i=0; $i<$produit['total']; $i++){
					if($photoproduit[$i]['id_produit']==$_POST['id']){
						$photoproduitok[$s]=$photoproduit[$i];
						$s++;

					}
				} 

				for($i=0; $i<$s; $i++ ){
					for($k=0; $k<$allUser['total']; $k++){
						if($photoproduitok[$i]['id_user']==$allUser[$k]['id']){
							$photoproduitok[$i]['nom']=$allUser[$k]['nom'].' '.$allUser[$k]['prenom'];
							//$trouve='ok';
							break;
						}
					}

				}

				if ($trouve =='non') {
					for($i=0; $i<$s; $i++ ){
						for($k=0; $k<$allUser1['total']; $k++){
							if($photoproduitok[$i]['id_user']==$allUser1[$k]['id']){
								$photoproduitok[$i]['nom']=$allUser1[$k]['nom'].' '.$allUser1[$k]['prenom'];
								$trouve='ok';
								break;
							}
						}

					}
				}
				
				$themeok['produit']=$_POST['numero_produit'];
				$themeok['taille']=$s;
				$data['photoproduits']=$photoproduitok;
				$this->load->view('ADMIN/index');
				$this->load->view('template_al/navigation');
				$this->load->view('WELCOME/produit_photo',$data);
				$this->load->view('ADMIN/footer');
	        }else{
	        	redirect(site_url(array('Administration','liste_PhotoP')));
	        }
        }else{
	   	 session_destroy();
		 redirect(site_url(array('Administration','formulaireConnexion')));
		}
  	}


	public function liste_PhotoP(){
		if (isset($_SESSION['ADMIN'])) {
			$photoproduit=$this->PhotoProduit->findAllPhotoProduitinbd();
			print_r($photoproduit);
			for ($i=0; $i <$photoproduit['total'] ; $i++) { 
				// $iduser[$i]=$produit[$i]['id_user'];
				$idproduit[$i]=$photoproduit[$i]['id_produit'];
			}
			// for ($i=0; $i <$photoproduit['total'] ; $i++) { 
			// 	$user= $this->User->finduserInfos($iduser[$i]);
			// 	$photoproduit[$i]['nom']= $user['nom'].' '.$user['prenom'];
			

			for ($i=0; $i <$photoproduit['total'] ; $i++) { 
				$produit= $this->Produit->findproduitInfos($idproduit[$i]);
				$photoproduit[$i]['produit']=$produit['numero_produit'];
			}
			$data['photoproduits']=$photoproduit;
			$this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/listePhotoProduit',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}

	public function supprimerPhotoP(){
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_POST) AND !empty($_POST)) {
				 $this->PhotoProduit->deletePhotoProduit($_POST['id']);
				 redirect(site_url(array('Administration','liste_PhotoP')));
			}else{
				redirect(site_url(array('Administration','liste_PhotoP')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}




    public function formulaireAddPhotoP(){
		if(isset($_SESSION['ADMIN'])){
			$Tproduit = $this->Produit->findAllProduitinbd();
			$data['nom']=$Tproduit;
			$allPhotoProduit=$this->PhotoProduit->findAllPhotoProduitmodel();
			$data['alluser']= $this->User->findAllUsersBd();
			$data['allPhotoProduit']= $this->PhotoProduit->findAllPhotoProduitinbd();
			 $this->load->view('ADMIN/index');
			$this->load->view('template_al/navigation');
			$this->load->view('WELCOME/formulaireAddPhotoProduit',$data);
			$this->load->view('ADMIN/footer');
		}else{
			session_destroy();
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


}
