<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {

		public function index(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/index_body');
			$this->load->view('WELCOME/index_footer');
		}

		public function inscription(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/inscription_client');
			$this->load->view('WELCOME/index_footer');
			
		}
		public function connexion(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/connexion_client');
			$this->load->view('WELCOME/index_footer');
			
		}

		public function Contact(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/contact');
			$this->load->view('WELCOME/index_footer');
		}

		public function Suite_Junior(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/SuiteJunior');
			$this->load->view('WELCOME/index_footer');
		}

		public function Twins(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/Twins');
			$this->load->view('WELCOME/index_footer');
		}

		public function Chambre_Standard(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/ChambreStandard');
			$this->load->view('WELCOME/index_footer');
		}

		public function Petit_Dejeuner(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/Petitdejeuner');
			$this->load->view('WELCOME/index_footer');
		}

		public function Buffet(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/Buffet');
			$this->load->view('WELCOME/index_footer');
		}

		public function Reservation1(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/reservation1');
			$this->load->view('WELCOME/index_footer');
		}

		public function View_reservations(){
			$this->load->view('WELCOME/index_index');
			$this->load->view('WELCOME/View_reservations');
			$this->load->view('WELCOME/index_footer');
		}
	}
?>