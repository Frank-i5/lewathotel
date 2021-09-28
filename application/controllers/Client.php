<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Client extends CI_Controller {

		public function index(){
			if (isset($_SESSION['Client'])) {
				$data['alloffre']=$this->Offre->findAllOffreBd();
				$this->load->view('WELCOME/index_index');
				$this->load->view('WELCOME/reservation1',$data);
				$this->load->view('WELCOME/index_footer');
			} else{
				session_destroy();
				redirect(site_url(array('Client','formulaireconnexion')));
			}
		}

	// Gestions des Administrateurs


	public function manageClient(){
		
		if (isset($_SESSION['Client'])) {
			
			$data['AllClient']=$this->Client->findAllClientBd();
			$this->load->view('WELCOME/index_index',$data);
			$this->load->view('WELCOME/index_body');
			$this->load->view('WELCOME/index_footer');
			
		}else{
			session_destroy();
			redirect(site_url(array('Client','formulaireConnexion')));
		}
	}


		// Ajoute un Client en BD //
		public function AddClient(){  
				if ( isset($_POST) ) {
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
									redirect(site_url(array('Client','index')));
				
							}else{
									$_SESSION['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
									$_SESSION['message']='non';
									redirect(site_url(array('Client','inscription')));
							}
						}else{
							$_SESSION['message_save']="L'image choisie  est endommagée  veuillez la remplacer svp !!";
							$_SESSION['message']='non';
							redirect(site_url(array('Client','inscription')));
						}

						
						
					} else{
							redirect(site_url(array('Client','inscription')));
					}
				} else{
			  	redirect(site_url(array('Client','inscription')));
				}
		}

		// verifie si le Client qu'il faut inserer existe deja en BD
		// et retourne 1 si oui et 0 sinon.
		public function testExitClient($email){   
			$etat = 0;
			$data['infoClient'] = $this->Client->findAllClientBd();
			if ($data['infoClient']['total'] <= 0) {
				
			}else{
				for ( $i=0; $i < $data['infoClient']['total'] ; $i++) { 
					if ($data['infoClient'][$i]['email'] == $email) {
						$etat = 1;
						break;
					}else{
						$etat = 0;
					}
				}
			}
			return $etat;
		}	

		// renvoie vers le formulaire de l'inscription
		public function inscription() {
				$this->load->view('WELCOME/index_index');
				$this->load->view('WELCOME/inscription_client');
				$this->load->view('WELCOME/index_footer');
		}	

		// renvoie vers le formulaire de connexion
		public function formulaireconnexion() {
				// $this->load->view('WELCOME/index_index');
				$this->load->view('WELCOME/connexion_client');
				// $this->load->view('WELCOME/index_footer');
		}

	public function manageConnexion(){
		
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$client = $this->Client->findAllClientBd();
			for ($i=0; $i < $client['total']; $i++) { 
				 if ($client[$i]['email'] == $_POST['email'] && $client[$i]['password'] == $_POST['password']) {
				 	$a=$client[$i]['id_user'];
				 	$_SESSION['Client'] = $client[$i] ;
				 	$info=$this->User->finduserInfos($a);
					$etat=1;
					
				}else{
					$etat=0;
				}
		 	}
			
			if ($etat==1) {
				$_SESSION['Client']['nom'] = $info['nom'];
				$_SESSION['Client']['prenom'] = $info['prenom'] ;
				$_SESSION['Client']['profil'] = $info['profil'];
				$_SESSION['Client']['telephone'] = $info['telephone'];
				redirect(site_url(array('Client','index')));
			}else{
				$_SESSION['ERR'] = 'Les Informations reçues ne correspondent à aucun Client dans notre Serveur.<br> <b>Veuillez recommencer SVP</b>';
				redirect(site_url(array('Client','formulaireConnexion')));
			}
		}
		else{
			redirect(site_url(array('Welcome','index')));
			
		}
	}

		// fonction pour deconnecter un Client
		public function deconnexion(){
			if (isset($_SESSION['Client'])) {
				session_destroy();
			}
			redirect(site_url(array('Client','index')));
		}

		public function detail_categories(){
			$this->load->view('USER/det_cat');
			
		}

		// lerob: j'ai commente ceci car il etait question qu'apres  l'ajout d'un commentaire, on puisse revenir
		//  sur la page du commentaire
		// public function ajoutCommentaire(){
		// 	if (isset($_SESSION['Abonne'])) {
		// 		if (isset($_POST) AND !empty($_POST)) {
		// 			$data['contenu']=$_POST['comment'];
		// 			$data['id_theme']=$_POST['id_theme'];
		// 			$data['date_creation']=$_POST['date_creation'];
		// 			$data['statut']=$_POST['niveau'];
		// 			$data['id_user']=$_POST['id_user'];
		// 			$this->Commentaire->hydrate($data);
		// 			$this->Commentaire->addCommentaire();
		// 			redirect(site_url(array('Welcome','liste_commentairetheme')));
		// 		}else{
		// 			redirect(site_url(array('Welcome','formulaireConnexion')));
		// 		}
		// 	}
		// }


	}


