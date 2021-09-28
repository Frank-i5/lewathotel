<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

class Reservation_model extends CI_Model{
	


			function __construct()
			{
			
			}


			// gerer un commentaire 

			private $id;
			private $id_user;
			private $id_produit;
			private $date_arrivee;
			private $date_depart;
			private $nbre_personne;
			private $statut;



			protected $table= 'reservation';


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

			public function findReservationInfos($id){
				$data =$this->db->select('date_arrivee,date_depart,nbre_personne')
						->from($this->table)
						->where(array('id'=>$id))
						->get()
						->result();

				$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['date_arrivee']=$row->date_arrivee;
			       	$donnees['date_depart']=$row->date_depart;
			       	$donnees['nbre_personne']=$row->nbre_personne;
			       	$donnees['data']='ok';
				}

				return $donnees;
			}



			public function addReservation(){

			    $this->db->set('id', $this->id)
			    	->set('id_user', $this->id_user)
			    	->set('id_produit', $this->id_produit)
			    	->set('date_arrivee', $this->date_arrivee)
			    	->set('date_depart', $this->date_depart)
			    	->set('nbre_personne', $this->nbre_personne)
			    	->set('statut', $this->statut)
					->insert($this->table);
		
			}


			public function findReservation($cible){
				$data = $this->db->select('id,id_user,id_produit,date_arrivee,date_depart,nbre_personne,statut')
								->from($this->table)
								->order_by('id','asc')
								->where('id_theme',$cible)
								->get()
								->result();

				$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['id_produit']=$row->id_produit;
			       	$donnees[$i]['date_arrivee']=$row->date_arrivee;
			       	$donnees[$i]['date_depart']=$row->date_depart;
			       	$donnees[$i]['nbre_personne']=$row->nbre_personne;
			       	$donnees[$i]['statut']=$row->statut;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
				return $donnees;
			}

			public function deleteReservation($cible){
		    	$this->db->where('id',$cible)
		    			->delete($this->table);
		    }



		    public function findallreservationbd(){
		    	$data= $this->db->select('id,id_user,id_produit,date_arrivee,date_depart,nbre_personne,statut')
		    			 ->from($this->table)
		    			 ->get()
		    			 ->result();
		    	$i=0;
				$donnees['data'] = 'non';	
				
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_user']=$row->id_user;
			       	$donnees[$i]['id_produit']=$row->id_produit;
			       	$donnees[$i]['date_arrivee']=$row->date_arrivee;
			       	$donnees[$i]['date_depart']=$row->date_depart;
			       	$donnees[$i]['nbre_personne']=$row->nbre_personne;
			       	$donnees[$i]['statut']=$row->statut;
			       	$i++;
			       	$donnees['data']='ok';
				}
				
				$donnees['total']=$i;
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
			
			public function setId_produit($id_produit){
				$this->id_produit=$id_produit;
			}

			public function setDate_arrivee($date_arrivee){
				$this->date_arrivee=$date_arrivee;
			}

			public function setDate_depart($date_depart){
				$this->date_depart=$date_depart;
			}

			public function setNbre_personne($nbre_personne){
				$this->nbre_personne=$nbre_personne;
			}


			public function setStatut($statut){
				$this->statut=$statut;
			}



			// getteurs


			public function getId(){
				return $this->id;
			}


			public function getId_user(){
				return $this->id_user;
			}
			
			public function getId_produit(){
				return $this->id_produit;
			}

			public function getDate_arrivee(){
				return $this->date_arrivee;
			}

			public function getDate_depart(){
				return $this->date_depart;
			}

			public function getNbre_personne(){
				return $this->nbre_personne;
			}


			public function getStatut(){
				return $this->statut;
			}


}

?>
