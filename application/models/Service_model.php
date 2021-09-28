<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

class Service_model extends CI_Model{


		function __construct()
			{
			
			}
	
			// gerer un service

			private $id;
			private $id_user;
			private $id_offre;
			private $nom_service;
			private $date_creation;
			private $date_modification;
			private $niveau;


			protected $table= 'service';


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

			public function findserviceInfos($id){
				$data =$this->db->select('nom_service')
						->from($this->table)
						->where(array('id'=>$id))
						->get()
						->result();

				$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['nom_service']=$row->nom_service;
			       	$donnees['data']='ok';
				}

				return $donnees;
			}

				//ajouter un service
			public function addService(){
				 $this->db->set('id', $this->id)
			    	->set('id_user', $this->id_user)
			    	->set('id_offre', $this->id_offre)
			    	->set('nom_service', $this->nom_service)
			    	->set('date_creation', $this->date_creation)
			    	->set('niveau', $this->niveau)
					->insert($this->table);
			}


			public function findAllServiceinbd(){
				$data = $this->db->select('id,id_user,id_offre,nom_service,date_creation,date_modification,niveau')
								->from($this->table)
								->order_by('id','desc') 
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['id_offre']=$row->id_offre;
			       	$donnees[$i]['nom_service']=$row->nom_service;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
			}

		    public function findAllServicemodel(){
	        	$data=$this->db->select('id, id_offre, id_user, nom_service, date_creation, date_modification, niveau')
	        			   ->from($this->table)
	        			   ->order_by('id','desc')
	        			   ->get()
	        			   ->result();

	        	$i=0;
	        	$donnees['data']='non';
	        	foreach ($data as $row) {
	        		$donnees[$i]['id']=$row->id;
	        		$donnees[$i]['id_offre']=$row->id_offre;
	        		$donnees[$i]['id_user']=$row->id_user;
	        		$donnees[$i]['nom_service']=$row->nom_service;
	        		$donnees[$i]['date_creation']=$row->date_creation;
	        		$donnees[$i]['date_modification']=$row->date_modification;
	        		$donnees[$i]['niveau']=$row->niveau;

	        		$donnees['data']='ok';
	        		$i++;
	        	}

	        	$donnees['total']=$i;
	        	return $donnees;
	        }

		    public function deleteService($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }


		    	//Rechercher tout les services qui correspondent a une offre entree en parametre
		    

		    public function findServiceinbd($cible){
			    $data = $this->db->select('id,id_user,id_offre,nom_service,date_creation,date_modification,niveau')
								->from($this->table)
								->where('id_offre',$cible)
								->order_by('id','desc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['id_offre']=$row->id_offre;
			       	$donnees[$i]['nom_service']=$row->nom_service;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
	        		$donnees[$i]['niveau']=$row->niveau;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
		    }

		    public function findServiceinfo($cible){
		    	$data = $this->db->select('id,id_offre,id_user,nom_service,date_creation,date_modification,niveau')
						->from($this->table)
						->where('id', $cible)
						->limit(1)
						->get()
						->result();

				$donnees['data'] = 'non';			
				foreach ($data as $row){
					$donnees['id'] = $row->id;
					$donnees['id_user'] = $row->id_user;
			       	$donnees['id_offre'] = $row->id_offre;
			       	$donnees['nom_service'] = $row->nom_service;
			       	$donnees['date_creation'] = $row->date_creation;
			       	$donnees['date_modification'] = $row->date_modification;
			       	$donnees['niveau'] = $row->niveau;
			       	$donnees['data'] = 'ok';
				}
				return $donnees;
		    }


		    public function empechersuppression($cible){
		    	$this->db->set('niveau',4)
            			 ->where('id',$cible)
						 ->update($this->table);
		    }
		    
		    public function UpdateService($cible){
				$this->db->set('id_offre',$this->id_offre)
				        ->set('nom_service',$this->nom_service)
				         ->set('date_modification',$this->date_modification)
            			 ->where('id',$cible)
						 ->update($this->table);
			}





			    //definition des getter et des setter
			   


			   // setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_user($id_user){
				$this->id_user=$id_user;
			}
			
			public function setId_offre($id_offre){
				$this->id_offre=$id_offre;
			}

			public function setNom_service($nom_service){
				$this->nom_service=$nom_service;
			}

			public function setDate_creation($date_creation){
				$this->date_creation=$date_creation;
			}

			public function setDate_modification($date_modification){
				$this->date_modification=$date_modification;
			}


			public function setNiveau($niveau){
				$this->niveau=$niveau;
			}			   


			   // getters


			public function getId(){
				$this->id;
			}


			public function getId_user(){
				$this->id_user;
			}
			
			public function getId_offre(){
				$this->id_offre;
			}

			public function getNom_service(){
				$this->nom_service;
			}

			public function getDate_creation(){
				$this->date_creation;
			}

			public function getDate_modification(){
				$this->date_modification;
			}


			public function getNiveau(){
				$this->niveau;
			}




}

?>
