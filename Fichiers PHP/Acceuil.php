<?php
class Acceuil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function afficher(){
		//chargement du data
		$data['actus'] = $this->db_model->get_all_actualite();
		$data['nb_comptes'] = $this->db_model->get_nb_comptes();
		//$data['concours'] = $this->db_model->get_all_concours();
		//chargement view haut
		$this->load->view('templates/haut', $data);

		//chargement view page_acceuil
		$this->load->view('page_acceuil', $data);

		//chargement view bas
		$this->load->view('templates/bas', $data);
	}
}
?>