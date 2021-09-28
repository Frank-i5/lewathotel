<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

	class admin_model extends CI_Model{
		function __construct()
			{
			
			}
		
			// gerer un admin

			private $id;
			private $id_user;
			private $email;
			private $password;


			protected $table= 'admin';


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


			// fonction qui charge tous les Admins pour faire le filtrage de donnee
			
			public function findAllAdminBd(){
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


			// fonction qui reccupère juste l'id_user d'un admin
			public function findAdminid_user($id){
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

			// fonction qui reccupère juste l'email d'un admin

			public function findAdminemail($id){
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

			// fonction qui reccupère juste le password d'un admin

			public function findAdminpassword($id){
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
			



			// fonction qui reccupère juste le password, email et l'id_user d'un admin

			public function findAdminInfos($id){
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

			public function UpdateAdmin(){
				$this->db->set('email',$this->email)
						->where('id',$this->id)
						->update($this->table);
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

			