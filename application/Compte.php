<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	
	public function index(){
		if (isset($_SESSION['USER'])) {
			
			redirect(site_url(array('Compte','Course')));
			// $this->load->view('COMPTE/home_header');
			// $this->load->view('COMPTE/navigation');
			// $this->load->view('COMPTE/home_account');
			// $this->load->view('WELCOME/footer');
		}else{
			$this->destroySession();
		}
	}

	public function allCourse(){
		if (isset($_SESSION['USER'])) {
			$data['AllEtudiants']=$this->Etudiant->findAllEtudiants();
			$data['AllAbonnes']=$this->Payement->findAllPayement();
			$data['allcourUser']=$this->Cours->findAllCoursByIdNiveau($_SESSION['USER']['id_niveau']);
			$sem1=0;
			$sem2=0;
			$sem3=0;
			$sem4=0;
			
			for ($i=0; $i <$data['allcourUser']['total'] ; $i++) {
				if ($data['allcourUser'][$i]['id_semestre']==1) {
				 	$data['allCoursSemetreI'][$sem1]=$data['allcourUser'][$i];
				 	$sem1++;	
			 	}elseif ($data['allcourUser'][$i]['id_semestre']==2) {
			 		$data['allCoursSemetreII'][$sem2]=$data['allcourUser'][$i];
				 	$sem2++;	
			 	}elseif ($data['allcourUser'][$i]['id_semestre']==3) {
			 		$data['allCoursSemetreIII'][$sem3]=$data['allcourUser'][$i];
				 	$sem3++;	
			 	}elseif ($data['allcourUser'][$i]['id_semestre']==4) {
			 		$data['allCoursSemetreIV'][$sem4]=$data['allcourUser'][$i];
				 	$sem4++;	
			 	}else{
			 		
			 	}
			}
			
			$data["total1"]=$sem1; 
		 	$data["total2"]=$sem2; 
		 	$data["total3"]=$sem3; 
		 	$data["total4"]=$sem4; 
			
			$this->load->view('COMPTE/home_header',$data);
			$this->load->view('COMPTE/navigation');
			$this->load->view('COMPTE/home_allcourse');
			$this->load->view('WELCOME/footer');
		}else{
			$this->destroySession();
		}
	}



	public function ValidCourse(){

		if (isset($_SESSION['USER'])) {
			if (isset($_POST['id_cours'])) {
				$_SESSION['id_cours']=$_POST['id_cours'];
			}
			$data['allAbonnementUser']=$this->Payement->findAllPayementUserCourse($_SESSION['USER']['id'],$_SESSION['id_cours']);
			$statut=1;
			for ($i=0; $i <$data['allAbonnementUser']['total'] ; $i++) { 
				if ($data['allAbonnementUser'][$i]['id_cour']==$_SESSION['id_cours']) {
					$statut=0;
					redirect(site_url(array('Compte','Course')));
				}else{
					$statut=1;
				}
			}
			if ($statut==1) {
				$data['infoCours']=$this->Cours->findCoursInfo($_SESSION['id_cours']);
				$_SESSION['infoCours']=$data['infoCours'];
				$this->load->view('COMPTE/home_header',$data);
				$this->load->view('COMPTE/navigation');
				$this->load->view('COMPTE/formvalidpay');
				$this->load->view('WELCOME/footer');
			}
			
			
		}else{
			$this->destroySession();
		}
	}


	public function ReadCourse(){

		if (isset($_SESSION['USER'])) {
			if (isset($_POST['id_cours'])) {
				$_SESSION['id_cours']=$_POST['id_cours'];
				$_SESSION['infoCours_forun']=$this->Cours->findCoursInfo($_POST['id_cours']);
			}
			$data['allAbonnementUser']=$this->Payement->findAllPayementUserCourse($_SESSION['USER'],$_SESSION['id_cours']);
			$statut=1;
			for ($i=0; $i <$data['allAbonnementUser']['total'] ; $i++) { 
				if ($data['allAbonnementUser'][$i]['id_cour']==$_SESSION['id_cours']) {
					$statut=0;
					redirect(site_url(array('Compte','Course')));
				}else{
					$statut=1;
				}
			}
			if ($statut==1) {
				$data['infoCours']=$this->Cours->findCoursInfo($_SESSION['id_cours']);
				$data['infopay']['id_etudiant']=$_SESSION['USER']['id'];
				$data['infopay']['id_cour']=$_SESSION['id_cours'];
				$data['infopay']['somme']=$data['infoCours']['prix'];
				$_SESSION['infopay']=$data['infopay'];

				$this->load->view('COMPTE/home_header',$data);
				$this->load->view('COMPTE/navigation');
				$this->load->view('COMPTE/verifAbon');
				$this->load->view('WELCOME/footer');
			}
			
			
		}else{
			$this->destroySession();
		}
	}



	public function Course1(){
		if (isset($_SESSION['USER'])) {
			$data['AllEtudiants']=$this->Etudiant->findAllEtudiants();
			$data['AllAbonnes']=$this->Payement->findAllPayement();
			$data['allcourUser']=$this->Cours->findAllCoursByIdNiveau($_SESSION['USER']['id_niveau']);
			$sem1=0;
			$sem2=0;
			$sem3=0;
			$sem4=0;
			
			for ($i=0; $i <$data['allcourUser']['total'] ; $i++) {
				if ($data['allcourUser'][$i]['id_semestre']==1) {
					for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
						if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
							$data['allCoursSemetreI'][$sem1]=$data['allcourUser'][$i];
							$data['allCoursSemetreI'][$sem1]['etat']=$data['AllAbonnes'][$j]['etat'];
							$sem1++;
				 		}
				 		
					}

				}elseif ($data['allcourUser'][$i]['id_semestre']==2) {
			 		
			 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
						if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
							$data['allCoursSemetreII'][$sem2]=$data['allcourUser'][$i];
							$data['allCoursSemetreII'][$sem2]['etat']=$data['AllAbonnes'][$j]['etat'];
							$sem2++;
				 		}
				 		
					}	
			 	}elseif ($data['allcourUser'][$i]['id_semestre']==3) {
			 		
			 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
						if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
							$data['allCoursSemetreIII'][$sem3]=$data['allcourUser'][$i];
							$data['allCoursSemetreIII'][$sem3]['etat']=$data['AllAbonnes'][$j]['etat'];
							$sem3++;
				 		}
				 		
					}	
			 	}elseif ($data['allcourUser'][$i]['id_semestre']==4) {
			 		
			 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
						if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
							$data['allCoursSemetreIV'][$sem4]=$data['allcourUser'][$i];
							$data['allCoursSemetreIV'][$sem4]['etat']=$data['AllAbonnes'][$j]['etat'];
							$sem4++;
				 		}
				 		
					}	
			 	}else{
			 		
			 	}
			}
			
			$data["total1"]=$sem1; 
		 	$data["total2"]=$sem2; 
		 	$data["total3"]=$sem3; 
		 	$data["total4"]=$sem4; 
			$this->load->view('COMPTE/home_header',$data);
			$this->load->view('COMPTE/navigation');
			$this->load->view('COMPTE/home_allusercourse');
			$this->load->view('WELCOME/footer');
		}else{
			$this->destroySession();
		}
	}


	public function Course(){
		if (isset($_SESSION['USER'])) {
			$data['AllEtudiants']=$this->Etudiant->findAllEtudiants();
			$etat=0;
			$data['AllAbonnes']=$this->Payement->findAllPayement();
			for ($i=0; $i <$data['AllAbonnes']['total'] ; $i++) { 
				if ($data['AllAbonnes'][$i]['id_etudiant']==$_SESSION['USER']['id']) {
					$etat=1;
					break;
				}else{
					$etat=0;
				}
			}
			if ($etat==0) {
				redirect(site_url(array('Compte','allCourse')));
			}else{
				$j=0;
				for ($i=0; $i <$data['AllAbonnes']['total'] ; $i++) { 
					if ($data['AllAbonnes'][$i]['id_etudiant']==$_SESSION['USER']['id']) {
						$data['allCourseUser']=$this->Payement->findAllUserPayment($_SESSION['USER']['id']);
						$j++;
					}
					
				}
				$k=0;
				for ($i=0; $i <$data['allCourseUser']['total'] ; $i++) { 
					$data['allcourUser'][$i]=$this->Cours->findAllCoursByIdNiveau_Id($_SESSION['USER']['id_niveau'],$data['allCourseUser'][$i]['id_cour']);
					$k++;
				}
				
				$data['allcourUser']['total']=$k;
				$sem1=0;
				$sem2=0;
				$sem3=0;
				$sem4=0;
				
				for ($i=0; $i <$data['allcourUser']['total'] ; $i++) {
					if ($data['allcourUser'][$i]['id_semestre']==1) {
						for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
							if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
								$data['allCoursSemetreI'][$sem1]=$data['allcourUser'][$i];
								$data['allCoursSemetreI'][$sem1]['etat']=$data['AllAbonnes'][$j]['etat'];
								$sem1++;
					 		}
					 		
						}

					}elseif ($data['allcourUser'][$i]['id_semestre']==2) {
				 		
				 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
							if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
								$data['allCoursSemetreII'][$sem2]=$data['allcourUser'][$i];
								$data['allCoursSemetreII'][$sem2]['etat']=$data['AllAbonnes'][$j]['etat'];
								$sem2++;
					 		}
					 		
						}	
				 	}elseif ($data['allcourUser'][$i]['id_semestre']==3) {
				 		
				 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
							if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
								$data['allCoursSemetreIII'][$sem3]=$data['allcourUser'][$i];
								$data['allCoursSemetreIII'][$sem3]['etat']=$data['AllAbonnes'][$j]['etat'];
								$sem3++;
					 		}
					 		
						}	
				 	}elseif ($data['allcourUser'][$i]['id_semestre']==4) {
				 		
				 		for ($j=0; $j <$data['AllAbonnes']['total'] ; $j++) { 
							if ($data['allcourUser'][$i]['id']==$data['AllAbonnes'][$j]['id_cour']) {
								$data['allCoursSemetreIV'][$sem4]=$data['allcourUser'][$i];
								$data['allCoursSemetreIV'][$sem4]['etat']=$data['AllAbonnes'][$j]['etat'];
								$sem4++;
					 		}
					 		
						}	
				 	}else{
				 		
				 	}
				}
				
				$data["total1"]=$sem1; 
			 	$data["total2"]=$sem2; 
			 	$data["total3"]=$sem3; 
			 	$data["total4"]=$sem4; 
			 	$this->load->view('COMPTE/home_header',$data);
				$this->load->view('COMPTE/navigation');
				$this->load->view('COMPTE/home_allusercourse');
				$this->load->view('WELCOME/footer');
			}
		}else{
			$this->destroySession();
		}
	}

	public function AboutCourse(){
		if (isset($_SESSION['USER'])) {
			if (isset($_POST['id_cours'])) {
				$data['infoPaiement']=$this->Payement->findPayementInfoBy_Id_cours($_POST['id_cours']);
				$_SESSION['id_cours']=$_POST['id_cours'];
			}elseif (isset($_POST['id_doc_cours'])) {
				$data['infoPaiement']=$this->Payement->findPayementInfoBy_Id_cours($_SESSION['id_cours']);
				$_SESSION['id_doc_cours']=$_POST['id_doc_cours'];
			}else{
				$data['infoPaiement']=$this->Payement->findPayementInfoBy_Id_cours($_SESSION['id_cours']);
			}
			
			if ($data['infoPaiement']['etat']==1) {
				if (isset($_POST['id_cours'])) {
					$data['infoCours']=$this->Cours->findCoursInfo($_POST['id_cours']);
					$data['AllCoursDoc']=$this->Document_Cours->findAllDocCoursByIdcours($data['infoCours']['id']);
					$_SESSION['id_cours']=$_POST['id_cours'];
					$_SESSION['type']="cours";
				}elseif (isset($_POST['id_doc_cours'])) {
					$data['infoDocCours']=$this->Document_Cours->findInfoDoc_Cours($_POST['id_doc_cours']);
					$data['AllCoursDoc']=$this->Document_Cours->findAllDocCoursByIdcours($data['infoDocCours']['id_cours']);
					$_SESSION['id_doc_cours']=$_POST['id_doc_cours'];
					$_SESSION['type']="docs";
				}else{
					if ($_SESSION['type']=="cours") {
						$data['infoCours']=$this->Cours->findCoursInfo($_SESSION['id_cours']);
						$data['AllCoursDoc']=$this->Document_Cours->findAllDocCoursByIdcours($data['infoCours']['id']);
					}else{
						$data['infoDocCours']=$this->Document_Cours->findInfoDoc_Cours($_SESSION['id_doc_cours']);
						$data['AllCoursDoc']=$this->Document_Cours->findAllDocCoursByIdcours($data['infoDocCours']['id_cours']);
					}
				}
				$this->load->view('COMPTE/home_header',$data);
				$this->load->view('COMPTE/navigation');
				$this->load->view('COMPTE/cours_lecture');
				$this->load->view('WELCOME/footer');
			}else{
				redirect(site_url(array('Compte','Course')));
			}
		}else{
			$this->destroySession();
		}
	}





	public function manageConnexion(){
		
		if (isset($_POST['email']) && isset($_POST['password'])) {
			
			$etudiant = $this->Etudiant->findAllEtudiants();
			for ($i=0; $i < $etudiant['total']; $i++) { 
				if ($etudiant[$i]['email'] == $_POST['email']) {
					$_SESSION['USER'] = $etudiant[$i];
				}else{
					print_r("oupssss");
				}
			}
			if (isset($_SESSION['USER'])) {
				redirect(site_url(array('Compte','index')));
			}else{
				$_SESSION['ERROR'] = 'Les paramtres recus ne correspondent a auccun Etudiant.<br> <b>Veuillez recommencer SVP</b>';
				redirect(site_url(array('Welcome','formulaireConnexion')));
			}
		}else{
			redirect(site_url(array('Welcome','formulaireConnexion')));
		}
	}



	public function testExitEtudiant($email){
        $etat=0;
        $data['infoPersonne']=$this->Etudiant->findAllEtudiants();
        if ($data['infoPersonne']['total']<=0) {
            
        }else{
            for ($i=0; $i <$data['infoPersonne']['total'] ; $i++) { 
                if ($data['infoPersonne'][$i]['email']==$email) {
                    $etat=1;
                    break;
                }else{
                    $etat=0;
                }
            }
        }
        return $etat;
    }

	public function addEtudiant(){
		if (isset($_POST)) {
			$etat=$this->testExitEtudiant($_POST['email']);
			if ($etat==0) {
				if (isset($_FILES['profil']) AND $_FILES['profil']['error'] == 0){
        		// Testons si le fichier n'est pas trop gros
                    if ($_FILES['profil']['size'] <= 100000000){
                        // Testons si l'extension est autorisée
                        $infosfichier =pathinfo($_FILES['profil']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('gif','png','jpg','jpeg','bmp');

                        // verification de lexistance de la table
                        if (in_array(strtolower($extension_upload),$extensions_autorisees)){
                            // On peut valider le fichier et le stocker définitivement
                            $config =$_FILES['profil']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i');
                            $ma_variable = str_replace('.', '_', $config);
                            $ma_variable = str_replace(' ', '_', $config);
                            $config = $ma_variable.'.'.$extension_upload;
                            $data['profil']=$config;
                            move_uploaded_file($_FILES['profil']['tmp_name'],'assets/images/user_profil/'.$config);
                        }else{
                            $data['message_save']="L'extension du fichier choisie  est  incorrect veuillez le remplacer svp !!";
                            $data['message']='non';
                        }
                        
                    }else{
                        $data['message_save']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
                        $data['message']='non';
                    }
                }else{
                    $data['message_save']="L'image choisie  est endommagée  veuillez le remplacer svp !!";
                    $data['message']='non';
                }
			
				$data['nom']=$_POST['nom'];
				$data['prenom']=$_POST['prenom'];
				$data['password']=$_POST['password'];
				$data['date']=date('Y-m-d H:i:s');
				$data['email']=$_POST['email'];
				$data['telephone']=$_POST['telephone'];
				$data['id_niveau']=$_POST['id_niveau'];
				$this->Etudiant->hydrate($data);
				$data['id_Etudiant']=$this->Etudiant->addEtudiant();
				$_SESSION['message_save']="Etudiant enregistré avec success !!";
		 		$_SESSION['success']='ok';
		 			
				if ($_SESSION['ADMIN']) {
					redirect(site_url(array('Administration','ListeEtudiants')));
				}else{
					$_SESSION['USER']=$this->Etudiant->findPersonneInfo($data['id_Etudiant']);
					redirect(site_url(array('Compte','index')));
				}
				
			}else{
				$_SESSION['message']="cette adresse mail est déjà utilisée! Bien vouloir là Modifier !!!";
				redirect(site_url(array('Welcome','formulaireConnexion')));
			}
		}else{
			$_SESSION['message']="Bien vouloirremplir tous les champs !!!";
			redirect(site_url(array('Welcome','formulaireConnexion')));
		}
		

	}




	// manage requetes


	public function mesRequetes()
    {
        if (isset($_SESSION['USER'])) {
            $data['AllRequete'] = $this->Requete->findAllRequete();
            $this->load->view('COMPTE/home_header');
            $this->load->view('COMPTE/navigation');
            $this->load->view('COMPTE/home_requete', $data);
            $this->load->view('WELCOME/footer');
        }
    }

    public function AddRequete()
    {

        if (isset($_SESSION['USER'])) {
            if (isset($_POST['btnSaveRequete'])) {
                $data['id'] = $_SESSION['USER']['id'];
                $data['titre'] = htmlspecialchars($_POST['titre']);
                $data['description'] = htmlspecialchars($_POST['description']);
                $data['date'] = date('Y-m-d H:i:s');

                $this->Requete->hydrate($data);
                $this->Requete->addRequete();
                $data['message_save'] = "Requete enregistré avec succès !!!";
                $data['message'] = 'oui';
            }

            redirect(site_url(array('Compte','mesRequetes')));


        }

    }

    public function deleteRequete()
    {
        if ($_SESSION['USER']) {
            if (isset($_POST['idreq'])) {
                $data['idreq'] = htmlspecialchars($_POST['idreq']);
                $this->Requete->deleteRequete($data);

                $data['AllRequete'] = $this->Requete->findAllRequete();
                $this->load->view('COMPTE/home_header');
                $this->load->view('COMPTE/navigation');
                $this->load->view('COMPTE/home_requete', $data);
                $this->load->view('WELCOME/footer');
            }
        }

    }

    public function updateRequete()
    {

        if ($_SESSION['USER']) {
            $data['requete'] = $this->Requete->findRequeteInfo($_POST['idreq']);
            $this->load->view('COMPTE/home_header');
            $this->load->view('COMPTE/navigation');
            $this->load->view('COMPTE/update_requete', $data);
            $this->load->view('WELCOME/footer');
        }
    }

        public function updateRequeteId()
    {

        if (isset($_POST['btnEditRequete'])) {
            $data['idreq'] = $_POST['idreq'];
            $data['titre'] = htmlspecialchars($_POST['titre']);
            $data['description'] = htmlspecialchars($_POST['description']);

            $this->Requete->EditRequete($data);
            $data['message_save'] = "Requete enregistré avec succès !!!";
            $data['message'] = 'oui';
            redirect(site_url(array('Compte','mesRequetes')));
        }
    }

    public function mesReponses()
    {
        if (isset($_SESSION['USER'])) {
            $data['idreq'] = $_POST['idreq'];
            $data['AllReponse'] = $this->Reponse->findAllReponse($data['idreq']);

            $data['requete']=$this->Requete->findRequeteInfo($data['idreq']);

            $this->load->view('COMPTE/home_header');
            $this->load->view('COMPTE/navigation');
            $this->load->view('COMPTE/home_reponse', $data);
            $this->load->view('WELCOME/footer');
        }
    }



	public function deconnexion(){
		if (isset($_SESSION['USER'])) {
			session_destroy();
		}
		redirect(site_url(array('Welcome','index')));
	}


	public function destroySession(){
		session_destroy();
		redirect(site_url(array('Welcome','index')));
	}


	
}
