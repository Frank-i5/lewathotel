<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

class Produit_model extends CI_Model{


		function __construct()
			{
			
			}
	
			// gerer un produit

			private $id;
			private $id_service;
			private $numero_produit;
			private $description;
			private $prix;
			private $date_creation;
			private $date_modification;
			private $niveau;


			protected $table= 'produit';


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

			public function findproduitInfos($id){
				$data =$this->db->select('numero_produit,description,prix')
						->from($this->table)
						->where(array('id'=>$id))
						->get()
						->result();

				$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['numero_produit']=$row->numero_produit;
			       	$donnees['description']=$row->description;
			       	$donnees['prix']=$row->prix;
			       	$donnees['data']='ok';
				}

				return $donnees;
			}

				//ajouter un produit
			public function addProduit(){
				 $this->db->set('id', $this->id)
			    	->set('id_service', $this->id_service)
			    	->set('numero_produit', $this->numero_produit)
			    	->set('description', $this->description)
			    	->set('prix', $this->prix)
			    	->set('date_creation', $this->date_creation)
			    	->set('niveau', $this->niveau)
					->insert($this->table);
			}


			public function findAllProduitinbd(){
				$data = $this->db->select('id, id_service, numero_produit, description, prix, date_creation, date_modification')
								->from($this->table)
								->order_by('id','desc') 
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_service']=$row->id_service;
			       	$donnees[$i]['numero_produit']=$row->numero_produit;
			       	$donnees[$i]['description']=$row->description;
			       	$donnees[$i]['prix']=$row->prix;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
			}


		    public function findAllProduitmodel(){
	        	$data=$this->db->select('id, id_service, numero_produit, description, prix, date_creation, date_modification, niveau')
	        			   ->from($this->table)
	        			   ->order_by('id','desc')
	        			   ->get()
	        			   ->result();

	        	$i=0;
	        	$donnees['data']='non';
	        	foreach ($data as $row) {
	        		$donnees[$i]['id']=$row->id;
	        		$donnees[$i]['id_service']=$row->id_service;
	        		$donnees[$i]['numero_produit']=$row->numero_produit;
	        		$donnees[$i]['description']=$row->description;
			       	$donnees[$i]['prix']=$row->prix;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
	        		$donnees[$i]['niveau']=$row->niveau;

	        		$donnees['data']='ok';
	        		$i++;
	        	}

	        	$donnees['total']=$i;
	        	return $donnees;
	        }

		    public function deleteProduit($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }


		    	//Rechercher tout les produits qui correspondent a une service entrés en parametre
		    

		    public function findProduitinbd($cible){
			    $data = $this->db->select('id, id_service, numero_produit, description, prix, date_creation, date_modification')
								->from($this->table)
								->where('id_service',$cible)
								->order_by('id','desc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_service']=$row->id_service;
			       	$donnees[$i]['numero_produit']=$row->numero_produit;
			       	$donnees[$i]['description']=$row->description;
			       	$donnees[$i]['prix']=$row->prix;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
		    }

		    public function findProduitinfo($cible){
		    	$data = $this->db->select('id, id_service, numero_produit, description, prix, date_creation, date_modification, niveau')
						->from($this->table)
						->where('id', $cible)
						->limit(1)
						->get()
						->result();

				$donnees['data'] = 'non';			
				foreach ($data as $row){
					$donnees['id'] = $row->id;
			       	$donnees['id_service'] = $row->id_service;
			       	$donnees['description'] = $row->description;
			       	$donnees[$i]['prix']=$row->prix;
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
		    
		    public function UpdateProduit($cible){
				$this->db->set('id_service',$this->id_service)
				        ->set('numero_produit',$this->numero_produit)
				        ->set('description',$this->description)
				        ->set('prix',$this->prix)
				         ->set('date_modification',$this->date_modification)
            			 ->where('id',$cible)
						 ->update($this->table);
			}





			    //definition des getter et des setter
			   


			   // setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_service($id_service){
				$this->id_service=$id_service;
			}

			public function setPrix($prix){
				$this->prix=$prix;
			}

			public function setDate_creation($date_creation){
				$this->date_creation=$date_creation;
			}

			public function setDate_modification($date_modification){
				$this->date_modification=$date_modification;
			}

			public function setDescription($description){
				$this->description=$description;
			}
			
			public function setNumero_produit($numero_produit){
				$this->numero_produit=$numero_produit;
			}


			public function setNiveau($niveau){
				$this->niveau=$niveau;
			}			   


			   // getters


			public function getId(){
				$this->id;
			}


			public function getId_service(){
				$this->id_service;
			}

			public function getPrix(){
				$this->prix;
			}

			public function getDate_creation(){
				$this->date_creation;
			}

			public function getDate_modification(){
				$this->date_modification;
			}

			public function getDescription(){
				$this->description;
			}
			
			public function getNumero_produit(){
				$this->numero_produit;
			}


			public function getNiveau(){
				$this->niveau;
			}




}

?>
