<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community_Manager extends CI_Controller {
	
	public function index(){
		
		 if (isset($_SESSION['Community_Manager'])) {
		 	
			$this->load->view('Community_Manager/index');
			$this->load->view('Community_Manager/navigation');
			$this->load->view('Community_Manager/home');
			$this->load->view('Community_Manager/footer');
		
				
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Community_Manager','formulaireConnexion')));
		}
	}
	 		
	
	// fonction qui charge le formulaire de connexion pour un Community Manager
	public function formulaireConnexion(){
		
		if (isset($_SESSION['Community_Manager'])) {
			if (isset($_SESSION['Community_Manager'])) {
				redirect(site_url(array('Community_Manager','index')));
			}else{
				session_destroy();
				redirect(site_url(array('Community_Manager','formulaireConnexion')));
			}
		}else{
			$this->load->view('gestion_community/formulaire_connexion');
		}
	}

	// Gestions des Community Manager


	public function manageCommunity(){
		
		if (isset($_SESSION['ADMIN'])) {
			
			$data['AllCommunity']=$this->CommunityManager->findAllCommunityBd();
			$this->load->view('Community_Manager/index', $data);
			$this->load->view('Community_Manager/navigation');
			$this->load->view('ADMIN/home_admin');
			$this->load->view('Community_Manager/footer');
			
		}else{
			session_destroy();
			redirect(site_url(array('Community_Manager','formulaireConnexion')));
		}
	}

	// Vérifier si un Community Manager existe en vérifiant l'email
	public function testExitCommunity($email){
        $etat=0;
        $data['infoCommunity']=$this->CommunityManager->findAllCommunityBd();
        if ($data['infoCommunity']['total']<=0) {
            
        }else{
            for ($i=0; $i <$data['infoCommunity']['total'] ; $i++) { 
                if ($data['infoCommunity'][$i]['email']==$email) {
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
			$community = $this->CommunityManager->findAllCommunityBd();
			for ($i=0; $i < $community['total']; $i++) { 
				 if ($community[$i]['email'] == $_POST['email'] && $community[$i]['password'] == $_POST['password']) {
				 	$a=$community[$i]['id_user'];
				 	$_SESSION['Community_Manager'] = $community[$i] ;
				 	$info=$this->User->finduserInfos($a);
					$etat=1;
					
				}else{
					$etat=0;
				}
		 	}
			
			if ($etat==1) {
				$_SESSION['Community_Manager']['nom'] = $info['nom'];
				$_SESSION['Community_Manager']['prenom'] = $info['prenom'] ;
				$_SESSION['Community_Manager']['nom'] = $info['nom'];
				$_SESSION['Community_Manager']['profil'] = $info['profil'];
				$_SESSION['Community_Manager']['telephone'] = $info['telephone'];
				redirect(site_url(array('Community_Manager','index')));
			}else{
				$_SESSION['ERR'] = 'Les paramètres reçus ne correspondent à aucun Community Manager dans notre Serveur.<br> <b>Veuillez recommencer SVP</b>';
				redirect(site_url(array('Community_Manager','formulaireConnexion')));
			}
		}
		else{
			redirect(site_url(array('Community_Manager','formulaireConnexion')));
			
		}
	}


	public function deconnexion(){
		if (isset($_SESSION['Community_Manager'])) {
			session_destroy();
		}
		redirect(site_url(array('Community_Manager','index')));
	}

	// éditer le profil


	public function voirprofil(){
		if (isset($_SESSION['Community_Manager'])) {
			$this->load->view('Community_Manager/index');
			$this->load->view('Community_Manager/navigation');
			$this->load->view('Community_Manager/profil');
			$this->load->view('Community_Manager/footer');
		}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
	}

	// formulaire de modification du profil

	public function formmodifierprofil(){
		if (isset($_SESSION['Community_Manager'])) {
			$this->load->view('Community_Manager/index');
			$this->load->view('Community_Manager/navigation');
			$this->load->view('Community_Manager/profil');
			$this->load->view('Community_Manager/footer');	
		}else{
				session_destroy();
				redirect(site_url(array('Community_Manager','formulaireConnexion')));
			}
	}

	// modification du profil

	public function modifierprofil(){
		if (isset($_SESSION['Community_Manager'])) {
			if (isset($_POST) AND !empty($_POST)) {

				if ($_POST['newnom']!=$_SESSION['Community_Manager']['nom']) {
					$data['nom']=$_POST['newnom'];
				}else{
					$data['nom']=$_SESSION['Community_Manager']['nom'];
				}
				if ($_POST['newprenom']!=$_SESSION['Community_Manager']['prenom']) {
					$data['prenom']=$_POST['newprenom'];
				}else{
					$data['prenom']=$_SESSION['Community_Manager']['prenom'];
				}
				if ($_POST['newemail']!=$_SESSION['Community_Manager']['email']) {
					$data['email']=$_POST['newemail'];
				}else{
					$data['email']=$_SESSION['Community_Manager']['email'];
				}
				if ($_POST['newpassword']!=$_SESSION['Community_Manager']['password']) {
					$data['password']=$_POST['newpassword'];
				}else{
					$data['password']=$_SESSION['Community_Manager']['password'];
				}
				if ($_FILES['newprofil']['name']!=$_SESSION['Community_Manager']['profil']) {
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
				            	$data['id']=$_SESSION['Community_Manager']['id'];
				            	$data['id_user']=$_SESSION['Community_Manager']['id_user'];
				            	$this->Admin->hydrate($data);
				            	$this->Admin->UpdateAdmin();
				            	$this->User->hydrate($data);
				            	$this->User->UpdateUserinfo();
				          		$this->load->view('Community_Manager/index');
								$this->load->view('Community_Manager/navigation');
								$this->load->view('Community_Manager/profil');
								$this->load->view('Community_Manager/footer');
								$_SESSION['message_save']='modification effective';
								$_SESSION['Community_Manager']['nom']=$data['nom'];
								$_SESSION['Community_Manager']['prenom']=$data['prenom'];
								$_SESSION['Community_Manager']['email']=$data['email'];
								$_SESSION['Community_Manager']['profil']=$data['profil'];

								redirect(site_url(array('Community_Manager','index')));
				            }else{
				            	$_SESSION['message_error']='!!echec de modification';
				            	redirect(site_url(array('Community_Manager','formmodifierprofil')));

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
					redirect(site_url(array('Community_Manager','voirprofil')));
				}
				
			}else{
				echo "string";
				redirect(site_url(array('Community_Manager','voirprofil')));
			}
		}else{
			session_destroy();
			redirect(site_url(array('Community_Manager','formulaireConnexion')));
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
									redirect(site_url(array('Community_Manager','index')));
				
							}else{
									$_SESSION['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
									$_SESSION['message']='non';
									redirect(site_url(array('Community_Manager','inscription')));
							}
						}else{
							$_SESSION['message_save']="L'image choisie  est endommagée  veuillez la remplacer svp !!";
							$_SESSION['message']='non';
							redirect(site_url(array('Community_Manager','inscription')));
						}

						
						
					} else{
							redirect(site_url(array('Community_Manager','inscription')));
					}
				} else{
			  	redirect(site_url(array('Community_Manager','inscription')));
				 }
		}	

		// renvoie vers le formulaire de connexion
		public function inscription() {
			$this->load->view('Community_Manager/inscription');
		}

	// fonction pour afficher la liste des utilisateurs
	public function Utilisateur() {
		if (isset($_SESSION['Community_Manager'])) {
			$alluser = $this->Client->findAllClient();
			$data['alluser']=$alluser;
			for ($i=0; $i <$data['alluser']['total'] ; $i++) { 
				$data['id_user'][$i]=$this->User->finduserInfos($data['alluser'][$i]['id_user']);
			$this->load->view('Community_Manager/index');
			$this->load->view('Community_Manager/navigation');
			$this->load->view('Community_Manager/listes_utilisateurs',$data);
			$this->load->view('Community_Manager/footer');
			}
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Community_Manager','index')));
		}
	}

	// fonction pour bloquer un utilisateur en BD
	public function BloquerUser() {
		  if (isset($_SESSION['Community_Manager'])) {
			$this->User->blocUser($_POST['cible']);
			redirect(site_url(array('Community_Manager','listBloquerUser')));
		}else{
			session_destroy();
			redirect(site_url(array('Community_Manager','formulaireConnexion')));
		}
	}

	// fonction pour afficher la liste des utilisateurs en vue de les bloquer
	public function listBloquerUser() {
		 if (isset($_SESSION['Community_Manager'])) {
			$listclient['hotel'] = $this->User->findAllUserBd();
			$this->load->view('Community_Manager/index');
			$this->load->view('Community_Manager/navigation');
			$this->load->view('Community_Manager/bloqueruser',$listclient);
			$this->load->view('Community_Manager/footer');
		}else{
	   	 session_destroy();
		 redirect(site_url(array('Community_Manager','formulaireConnexion')));
		}
	}


	public function addoffre(){

		if (isset($_SESSION['Community_Manager'])){
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
		if(isset($_SESSION['Community_Manager'])){
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
		if(isset($_SESSION['Community_Manager'])){
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
		if(isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if(isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])) {
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

			if (isset($_SESSION['Community_Manager'])){
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
		if(isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if(isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])) {
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

			if (isset($_SESSION['Community_Manager'])){
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
		if(isset($_SESSION['Community_Manager'])){
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if (isset($_SESSION['Community_Manager'])) {
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
		if(isset($_SESSION['Community_Manager'])){
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
