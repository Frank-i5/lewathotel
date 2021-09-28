<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

	class Client_model extends CI_Model{

			function __construct(){
				
			}
		
			// gerer un Client

			private $id;
			private $id_user;
			private $email;
			private $password;

			protected $table= 'client';

			public function hydrate( array $donnees ){
				foreach ( $donnees as $key => $value ){
					$method = 'set'.ucfirst($key);
					if ( method_exists($this, $method) ){
						$this->$method( $value );
					}
				}
			}

			public function compte($where = array()){
				return (int) $this->db->where($where)->count_all_results($this->table);
			}

			public function AddClient($data){
				$this->db->set('email', $data['email'])
						->set('password', $data['password'])
						->set('id_user', $data['id_user'])
						->insert($this->table);
			}

			public function findAllClientBd(){
				$data = $this->db->select('id,id_user,email,password')
								->from($this->table)
								->order_by('id','desc')
								->get()
								->result();

				$i = 0;
				$donnees['data'] = 'non';	
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['email']=$row->email;
			       	$donnees[$i]['password']=$row->password;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total'] = $i;
				return $donnees;	
			}

			// fonction qui reccupère les infos d'un utilisateur dont l'id est passe en parametre
			public function findclientInfos($cible){
				$data = $this->db->select('id,id_user,email,password')
						->from($this->table)
						->where('id_user', $cible)
						->limit(1)
						->get()
						->result();
				$donnees['data'] = 'non';			
				foreach ($data as $row){
			       	$donnees['id'] = $row->id;
			       	$donnees['id_user'] = $row->id_user;
			       	$donnees['email'] = $row->email;
			       	$donnees['password'] = $row->password;
			       	$donnees['data'] = 'ok';
				}

				return $donnees;
			}

			
			//definition des getter et des setter
				
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