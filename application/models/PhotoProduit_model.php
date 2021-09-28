<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

class PhotoProduit_model extends CI_Model{


		function __construct()
			{
			
			}
	
			// gerer photo du produit

			private $id;
			private $id_produit;
			private $photo;
			private $date_creation;
			private $date_modification;
			private $niveau;


			protected $table= 'photo_produit';


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


			public function findphotoproduitInfos($id){
				$data =$this->db->select('photo')
						->from($this->table)
						->where(array('id'=>$id))
						->get()
						->result();

				$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['photo']=$row->photo;
			       	$donnees['data']='ok';
				}

				return $donnees;
			}

				//ajouter une photo du produit
			public function addPhotoProduit(){
				 $this->db->set('id', $this->id)
			    	->set('id_produit', $this->id_produit)
			    	->set('photo', $this->photo)
			    	->set('date_creation', $this->date_creation)
			    	->set('date_modification', $this->date_modification)
			    	->set('niveau', $this->niveau)
					->insert($this->table);
			}


			public function findAllPhotoProduitinbd(){
				$data = $this->db->select('id, id_produit, photo, date_creation, date_modification')
								->from($this->table)
								->order_by('id','desc') 
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_produit']=$row->id_produit;
			       	$donnees[$i]['photo']=$row->photo;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
			}


		    public function findAllPhotoProduitmodel(){
	        	$data=$this->db->select('id, id_produit, photo, date_creation, date_modification, niveau')
	        			   ->from($this->table)
	        			   ->order_by('id','desc')
	        			   ->get()
	        			   ->result();

	        	$i=0;
	        	$donnees['data']='non';
	        	foreach ($data as $row) {
	        		$donnees[$i]['id']=$row->id;
	        		$donnees[$i]['id_produit']=$row->id_produit;
	        		$donnees[$i]['photo']=$row->photo;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
	        		$donnees[$i]['niveau']=$row->niveau;

	        		$donnees['data']='ok';
	        		$i++;
	        	}

	        	$donnees['total']=$i;
	        	return $donnees;
	        }

		    public function deletePhotoProduit($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }


		    	//Rechercher tout les produits qui correspondent a une service entrés en parametre
		    

		    public function findPhotoProduitinbd($cible){
			    $data = $this->db->select('id, id_produit, photo, date_creation, date_modification')
								->from($this->table)
								->where('id_service',$cible)
								->order_by('id','desc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_produit']=$row->id_produit;
			       	$donnees[$i]['description']=$row->description;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
		    }

		    public function findPhotoProduitinfo($cible){
		    	$data = $this->db->select('id, id_produit, photo, date_creation, date_modification, niveau')
						->from($this->table)
						->where('id', $cible)
						->limit(1)
						->get()
						->result();

				$donnees['data'] = 'non';			
				foreach ($data as $row){
					$donnees['id'] = $row->id;
			       	$donnees['id_produit'] = $row->id_produit;
			       	$donnees['photo'] = $row->photo;
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
		    
		    public function UpdatePhotoProduit($cible){
				$this->db->set('id_produit',$this->id_produit)
				        ->set('photo',$this->photo)
				         ->set('date_modification',$this->date_modification)
            			 ->where('id',$cible)
						 ->update($this->table);
			}


			    //definition des getter et des setter
			   


			   // setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_produit($id_produit){
				$this->id_produit=$id_produit;
			}

			public function setPhoto($photo){
				$this->photo=$photo;
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


			public function getId_produit(){
				$this->id_produit;
			}

			public function getPhoto(){
				$this->photo;
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
