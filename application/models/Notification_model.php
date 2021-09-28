<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

	class Notification_model extends CI_Model{

			function __construct(){
				
			}
		
			// gerer un Client

			private $id;
			private $id_user;
			private $email;
			private $password;

			protected $table= 'notification';

			public function hydrate( array $donnees ){
				foreach ( $donnees as $key => $value ){
					$method = 'set'.ucfirst($key);
					if ( method_exists($this, $method) ){
						$this->$method( $value );
					}
				}
			}



			// setteurs

				public function setId($id){
					$this->id=$id;
				}

				public function setId_user($id_user){
					$this->id_user=$id_user;
				}


				public function setNom($nom){
					$this->nom=$nom;
				}
				
				public function setPrenom($prenom){
					$this->prenom=$prenom;
				}

				public function setProfil($profil){
					$this->profil=$profil;
				}

				public function setNiveau($Niveau){
					$this->niveau=$Niveau;
				}

				public function setCouleur_prefere($couleur_prefere){
					$this->couleur_prefere=$couleur_prefere;
				}
			

			// getteurs

				public function getId(){
					return $this->id;
				
				}

				public function getId_user(){
					return $this->id_user;
				
				}

				
				public function getNom(){
					return $this->nom;
				
				}

				public function getPrenom(){
					return $this->prenom;
				
				}

				public function getProfil(){
					return $this->profil;
				
				}

				public function getNiveau(){
					return $this->niveau;
				
				}

				public function getCouleur_prefere(){
					return $this->couleur_prefere;
				
				}
						
	
	}

?>