<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

	class Offre_model extends CI_Model{
	


		function __construct()
			{
			
			}

			// gerer une offre

			private $id;
			private $id_user;
			private $nom_offre;
			private $date_creation;
			private $date_modification;
			private $niveau;


			protected $table= 'offre';


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


			public function addOffre(){

			    $this->db->set('id', $this->id)
			    	->set('id_user', $this->id_user)
			    	->set('nom_offre', $this->nom_offre)
			    	->set('date_creation', $this->date_creation)
			    	->set('niveau', $this->niveau)
					->insert($this->table);
		
			}




				// fonction qui charge toutes les offres pour faire le filtrage de donnee
			
			public function findAllOffreBd(){
				$data = $this->db->select('id,id_user,nom_offre,date_creation,date_modification,niveau')
								->from($this->table)
								->order_by('id','desc')
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['nom_offre']=$row->nom_offre;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_modification']=$row->date_modification;
			       	$donnees[$i]['niveau']=$row->niveau;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;	
			}


			// fonction qui reccupère les infos d'une offre dont l'id est passe en parametre

			public function findoffreInfos($cible){
				$data = $this->db->select('id,id_user,nom_offre,date_creation,date_modification,niveau')
						->from($this->table)
						->where('id', $cible)
						->limit(1)
						->get()
						->result();

				$donnees['data'] = 'non';			
				foreach ($data as $row){
					$donnees['id'] = $row->id;
					$donnees['id_user'] = $row->id_user;
			       	$donnees['nom_offre'] = $row->nom_offre;
			       	$donnees['date_creation'] = $row->date_creation;
			       	$donnees['date_modification'] = $row->date_modification;
			       	$donnees['niveau'] = $row->niveau;
			       	$donnees['data'] = 'ok';
				}
				return $donnees;

            }


            public function UpdateOffre($cible,$newnom,$date_modification){
				$this->db->set('nom_offre',$newnom)
				         ->set('date_modification',$date_modification)
            			 ->where('id',$cible)
						 ->update($this->table);
			}



			public function deleteOffre($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }

			    //definition des getter et des setter
			   


			   // setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_user($id_user){
				$this->id_user=$id_user;
			}
			
			public function setNom_offre($nom_offre){
				$this->nom_offre=$nom_offre;
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


			// getteurs


			public function getId(){
				$this->id;
			}


			public function getId_user(){
				$this->id_user;
			}
			
			public function getNom_offre(){
				$this->nom_offre;
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