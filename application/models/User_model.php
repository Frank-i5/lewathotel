<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

	class User_model extends CI_Model{
		
			// gerer un user
				private $id;
				private $nom;
				private $prenom;
				private $profil;
				private $telephone;
				private $notif;
				private $niveau;

				protected $table= 'user';

			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}

			public function compte($where = array()){
				return (int) $this->db->where($where)->count_all_results($this->table);
			}

			// fonction qui Ajoute un User en Base de Donnee
			public function AddUser($data){
			    $this->db->set('nom', $data['nom'])
									 ->set('prenom', $data['prenom'])
									 ->set('telephone', $data['telephone'])
									 ->set('profil', $data['profil'])
									 ->set('notif', $data['notif'])
									 ->set('niveau', $data['niveau'])
									 ->insert($this->table);
		
			}

			// fonction qui charge tous les Users pour faire le filtrage de donnee
			
			public function findAllUsersBd(){
				$data = $this->db->select('id,nom,prenom,profil,niveau,notif')
								->from($this->table)

								->order_by('id','asc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['profil']=$row->profil;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$donnees[$i]['notif']=$row->notif;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}

			// fonction qui charge tous les admin
			public function findAdmin(){
				$data = $this->db->select('id,nom,prenom,profil,niveau,notif')
								->from($this->table)
								->where('niveau', 3)
								// ->order_by('id','asc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['profil']=$row->profil;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$donnees[$i]['notif']=$row->notif;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}


			// fonction qui charge tous les Community Manager
			public function findCommunity(){
				$data = $this->db->select('id,nom,prenom,telephone,profil,niveau,notif')
								->from($this->table)
								->where('niveau', 2)
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['telephone']=$row->telephone;
			       	$donnees[$i]['profil']=$row->profil;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$donnees[$i]['notif']=$row->notif;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}




			// fonction qui charge le dernier User enregitre en Base de Donnee
			public function findLastUser(){
				$Lastuser = $this->db->select('id,nom,prenom,profil')
												 ->from($this->table)
												 ->order_by('id','desc')
												 ->limit(1)
												 ->get()
												 ->result();
				foreach ($Lastuser as $row) {
					 $donnees['user']['id'] = $row->id;
				}
			 
				return $donnees;
			}

			// fonction qui actualise le niveau d'un user en BD
			public function UpdateUser($cible){
				$this->db->set('niveau',2)
            			 ->where('id',$cible)
						 ->update($this->table);
			}


			// fonction qui reccupère les infos d'un user dont l'id est passe en parametre
			public function finduserInfos($cible){
				$data = $this->db->select('id,nom,prenom,telephone,profil,notif,niveau')
						->from($this->table)
						->where('id', $cible)
						->limit(1)
						->get()
						->result();

				$donnees['data'] = 'non';			
				foreach ($data as $row){
			       	$donnees['nom'] = $row->nom;
			       	$donnees['id'] = $row->id;
			       	$donnees['prenom'] = $row->prenom;
			       	$donnees['telephone'] = $row->telephone;
			       	$donnees['profil'] = $row->profil;
			       	$donnees['notif'] = $row->notif;
			       	$donnees['niveau'] = $row->niveau;
			       	$donnees['data'] = 'ok';
				}

				return $donnees;
			}

			// fonction qui charge tous les Users pour faire le filtrage de donnee
			public function findAllUserBd(){
				$data = $this->db->select('id,nom,prenom,profil,niveau,notif')
								->from($this->table)
								->where('niveau', 1)

								->order_by('id','asc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['profil']=$row->profil;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$donnees[$i]['notif']=$row->notif;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}


			public function UpdateUserinfo(){
				$this->db->set('nom',$this->nom)
						->set('prenom',$this->prenom)
						->set('profil',$this->profil)
						->where('id',$this->id_user)
						->update($this->table);
			}


			// fonction qui actualise le niveau d'un user en BD
			public function blocUser($cible){
				$this->db->set('niveau',0)
            			 ->where('id',$cible)
						 ->update($this->table);
			}


			// fonction qui charge tous les Users Bloque
			public function findBlockUser(){
				$data = $this->db->select('id,nom,prenom,profil,niveau,notif')
								->from($this->table)
								->where('niveau', 0)
								->order_by('id','asc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['profil']=$row->profil;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$donnees[$i]['notif']=$row->notif;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}

			// fonction qui actualise le niveau d'un user en BD
			public function chuterUser($cible){
				$this->db->set('niveau',1)
            			 ->where('id',$cible)
						 ->update($this->table);
			}


			// fonction qui actualise le niveau d'un user en BD
			public function deblocUser($cible){
				$this->db->set('niveau',1)
            			 ->where('id',$cible)
						 ->update($this->table);
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

				public function setTelephone($telephone){
					$this->telephone=$telephone;
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

				public function getTelephone(){
					return $this->telephone;
				
				}
						
	
	}

?>




