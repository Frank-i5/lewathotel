<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

class CommunityManager_model extends CI_Model{


		function __construct()
			{
			
			}
	
			// gerer un community manager

			private $id;
			private $id_user;
			private $email;
			private $password;


			protected $table= 'community_manager';


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


			// fonction qui charge tous les Community Manager pour faire le filtrage de donnee
			
			public function findAllCommunityBd(){
				$data = $this->db->select('id,id_user,email,password')
								->from($this->table)
								->order_by('id','desc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['email']=$row->email;
			       	$donnees[$i]['password']=$row->password;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}

			public function AddCommunity1($data){
				$this->db->set('email', $data['email'])
						->set('password', $data['password'])
						->set('id_user', $data['id_user'])
						->insert($this->table);
			}

		    public function deleteCommunity($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }


			// fonction qui reccupère juste l'id_user d'un admin
			public function findCommunityid_user($id){
				$data =$this->db->select('id_user')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();

								
				foreach ($data as $row){
			       	$donnees['id_user']=$row->id_user;
				}

				return $donnees['id_user'];
			}

			public function AddCommunity(){
			    $this->db->set('email', $this->email)
						->set('password', $this->password)
						->set('id_user', $this->id_user)
						->insert($this->table);
		
			}

			// fonction qui reccupère juste l'email d'un Community Manager

			public function findCommunityemail($id){
				$data =$this->db->select('email')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();

								
				foreach ($data as $row){
			       	$donnees['email']=$row->email;
				}

				return $donnees['email'];
			}

			// fonction qui reccupère juste le password d'un Community Manager

			public function findCommunitypassword($id){
				$data =$this->db->select('password')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();

					$donnees['password']='non';				
				foreach ($data as $row){
			       	$donnees['password']=$row->password;
				}

				return $donnees['password'];
			}
			



			// fonction qui reccupère juste le password, email et l'id_user d'un Community Manager

			public function findCommunityInfos($id){
				$data =$this->db->select('password,email,id_user')
						->from($this->table)
						->where('id',$id)
						->limit(1)
						->get()
						->result();

				$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['email']=$row->email;
			       	$donnees['password']=$row->password;
			       	$donnees['id_user']=$row->id_user;
			       	$donnees['data']='ok';
				}

				return $donnees;
			}

			public function UpdateCommunity(){
				$this->db->set('email',$this->email)
						->where('id',$this->id)
						->update($this->table);
			}

			// fonction pour supprimer un community manager
			public function suppCommunity($cible){
				$this->db->set('email', '')
						->set('password', '')
						->set('id_user', '')
						->where('id_user', $cible['id_user'])
						->delete($this->table);
			}



			// setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_user($id_user){
				$this->id_user=$id_user;
			}
			
			public function setEmail($email){
				$this->email=$email;
			}

			public function setPassword($password){
				$this->password=$password;
			}

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			
			public function getId_user(){
				return $this->id_user;
			
			}

			public function getEmail(){
				return $this->email;
			
			}

			public function getPassword(){
				return $this->password;
			
			}
			
	}


?>